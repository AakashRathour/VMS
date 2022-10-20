@if (Session::has('message'))
    <script>
        //type = success,warn,info,error;
        $.notify("{{ Session::get('message') }}", "{{ Session::get('type') }}");
    </script>
@endif
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()

        $('.select2-single').select2();

        // Select2 Single  with Placeholder
        $('.select2-single-placeholder').select2({
            placeholder: "Select a Province",
            allowClear: false
        });

        // Select2 Multiple
        $('.select2-multiple').select2();

        // Error Hides - Select2
        $("select").on("change", function() {
            $(this).siblings('.is-invalid').addClass('d-none')
        })

        // Bootstrap Date Picker
        $('.simple-date1 .input-group.date').datepicker({
            format: 'yyyy-mm-dd',
            todayBtn: 'linked',
            todayHighlight: true,
            autoclose: true,
        });

        $('#simple-date2 .input-group.date').datepicker({
            startView: 1,
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });

        $('#simple-date3 .input-group.date').datepicker({
            startView: 2,
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });

        $('#simple-date4 .input-daterange').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            todayBtn: 'linked',
        });

        // Error Hides - input date
        $(".input-group.date").on("change", function() {
            $(this).children('input.is-invalid').removeClass('is-invalid').addClass('is-valid')
            $(this).parent().children('span.is-invalid').addClass('d-none')
        })

        // TouchSpin
        $('#touchSpin1').TouchSpin({
            min: 0,
            max: 100,
            boostat: 5,
            maxboostedstep: 10,
            initval: 0
        });

        $('#touchSpin2').TouchSpin({
            min: 0,
            max: 100,
            decimals: 2,
            step: 0.1,
            postfix: '%',
            initval: 0,
            boostat: 5,
            maxboostedstep: 10
        });

        $('#touchSpin3').TouchSpin({
            min: 0,
            max: 100,
            initval: 0,
            boostat: 5,
            maxboostedstep: 10,
            verticalbuttons: true,
        });

        $('#clockPicker1').clockpicker({
            donetext: 'Done'
        });

        $('#clockPicker2').clockpicker({
            autoclose: true
        });

        let input = $('#clockPicker3').clockpicker({
            autoclose: true,
            'default': 'now',
            placement: 'top',
            align: 'left',
        });

        $('#check-minutes').click(function(e) {
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });

        $(window).keydown(function(event) {
			// Enter Key, Function Keys, Backspace, tab, escape, left, up, right, bottom key
			if([8,9,13,27,37,38,39,40,112,113,114,115,116,117,118,119,120,121,122,123].includes(event.keyCode) || event.ctrlKey || event.altKey || event.metaKey) {
				if($(event.target).prop('value') < 0 && event.target.type == "number") {
					$(event.target).prop('value',0)
				}

				return true;
			}

			if(event.target.type == "number") {
				if($(event.target).prop('value').length >= 10 && ["mobile","user_mobile"].includes(event.target.name)) {
					event.preventDefault()
					return false
				} else if($(event.target).prop('value').length >= 6 && ["pincode","user_pincode","vehicle_pincode"].includes(event.target.name)) {
					event.preventDefault()
					return false
				} else if(event.shiftKey) {
					event.preventDefault()
					return false
				} else if(![48,49,50,51,52,53,54,55,56,57,96,97,98,99,100,101,102,103,104,105].includes(event.keyCode)) { // number range
					event.preventDefault()
					return false
				}
			}

            if(["name"].includes(event.target.name)) {
				if(event.shiftKey && ![32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90].includes(event.keyCode)) {
					event.preventDefault()
					return false
				}
				if(![32,48,49,50,51,52,53,54,55,56,57,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,96,97,98,99,100,101,102,103,104,105].includes(event.keyCode)) { // alpha numeric range
					event.preventDefault()
					return false
				}
			}

            if(["contact_person"].includes(event.target.name)) {
				if(event.shiftKey && ![32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90].includes(event.keyCode)) {
					event.preventDefault()
					return false
				}
				if(![32,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90].includes(event.keyCode)) { // alphabet range
					event.preventDefault()
					return false
				}
			}

            if(["engine_number","chasis_number","registration_number","policy_number","puc_certificate_number"].includes(event.target.name)) {
				if(event.shiftKey && ![65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90].includes(event.keyCode)) {
					event.preventDefault()
					return false
				}
                
                if($(event.target).prop('value').length >= 20 && ["engine_number","chasis_number","puc_certificate_number"].includes(event.target.name)) {
                    event.preventDefault()
                    return false
                }
                
                if($(event.target).prop('value').length >= 30 && ["policy_number"].includes(event.target.name)) {
                    event.preventDefault()
                    return false
                }
                
                if($(event.target).prop('value').length >= 11 && ["registration_number"].includes(event.target.name)) {
                    event.preventDefault()
                    return false
                }
                
                if(![48,49,50,51,52,53,54,55,56,57,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,96,97,98,99,100,101,102,103,104,105].includes(event.keyCode)) { // alpha numeric range
					event.preventDefault()
					return false
				}
			}
		});

        $(window).keyup(function(event) {
            if(["engine_number","chasis_number","registration_number","policy_number","puc_certificate_number"].includes(event.target.name)) {
                $(event.target).prop('value',$(event.target).prop('value').toUpperCase());
            } else if(["email"].includes(event.target.name)) {
                $(event.target).prop('value',$(event.target).prop('value').toLowerCase());
            }
        })
    })

    setCookie = (cname, cvalue, exdays, action) => {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires + '; path=/';
    }

    getCookie = (cname) => {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return undefined;
    }

    deleteAllCookies = () => {
        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
        }
    }

    // Display Notification
    dNoti = (message, type) => {
        $.notify(message, type);
    }

    let csrf_token = "{{ csrf_token() }}"
    let x_api_key = "{{ Config::get('app.X_API_KEY') }}"
    let access_token = getCookie("access_token_web")
    logout = () => {
        $.ajax({
            url: "{{ route('vms.logout') }}",
            data: {
                _token: csrf_token
            },
            type: "POST",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', x_api_key);
            },
            success: function(resp) {
                if (resp.success) {
                    deleteAllCookies()
                    dNoti(resp.message, "success")
                    setTimeout(function() {
                        window.location.href = "{{ route('login') }}"
                    }, 150);
                } else {
                    dNoti(resp.message, "error")
                }
            },
            error: function(request, error) {}
        });
    }

    let prevPincode = undefined
    searchPincode = (pincode,stateTarget,districtTarget,tehsilTarget) => {
        if(pincode.length < 6 || prevPincode == pincode)
            return false
        
        prevPincode = pincode
        $.ajax({
            url: "{{ route('V1.ajax.searchPincode') }}",
            data: {
                pincode: pincode,
            },
            type: "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', x_api_key);
                xhr.setRequestHeader('Authorization', `Bearer ${access_token}`);
            },
            success: function(resp) {
                if (resp.success) {
                    if(resp.data) {
                        if(resp.data.state_id)
                            $(stateTarget).select2().val(resp.data.state_id).trigger("change")
                        
                        if(resp.data.state_id)
                            getDistricts(resp.data.state_id,districtTarget,resp.data.district_id)
                        
                        if(resp.data.state_id && resp.data.district_id)
                            getTehsils(resp.data.district_id,tehsilTarget,resp.data.tehsil_id)
                    }
                } else {
                    dNoti("Something Went Wrong", "error")
                }
            },
            error: function(request, error) {
                if(request.statusCode().status == 401) {
                    logout()
                }
            }
        });
    }

    getDistricts = (state_id, target, prevValue = undefined) => {
        $(target).empty()
        $.ajax({
            url: "{{ route('V1.general.districts') }}",
            data: {
                state_id: state_id,
            },
            type: "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', x_api_key);
                xhr.setRequestHeader('Authorization', `Bearer ${access_token}`);
            },
            success: function(resp) {
                var optionsAsString = "<option value='' data-slug=''>Select District</option>";
                if (resp.success) {
                    var data = resp.data
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            selected = prevValue == data[i].id ? 'selected' : '';
                            optionsAsString +=
                                `<option value='${data[i].id}' data-slug='${data[i].slug}' ${selected}>${data[i].name}</option>`;
                        }
                        $(target).append(optionsAsString);
                    }
                } else {
                    dNoti("Something Went Wrong", "error")
                }
            },
            error: function(request, error) {
                if(request.statusCode().status == 401) {
                    logout()
                }
            }
        });
    }

    getTehsils = (district_id, target, prevValue = undefined) => {
        $(target).empty()
        $.ajax({
            url: "{{ route('V1.general.tehsils') }}",
            data: {
                district_id: district_id,
            },
            type: "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', x_api_key);
                xhr.setRequestHeader('Authorization', `Bearer ${access_token}`);
            },
            success: function(resp) {
                var optionsAsString = "<option value=''>Select Tehsil</option>";
                if (resp.success) {
                    var data = resp.data
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            selected = prevValue == data[i].id ? 'selected' : '';
                            optionsAsString +=
                                `<option value='${data[i].id}' ${selected}>${data[i].name}</option>`;
                        }
                        $(target).append(optionsAsString);
                    }
                } else {
                    dNoti("Something Went Wrong", "error")
                }
            },
            error: function(request, error) {
                if(request.statusCode().status == 401) {
                    logout()
                }
            }
        });
    }

    getBrands = (target, productTypeTarget, prevValue = undefined) => {
        var product_type_id =   $(productTypeTarget).val()
        $(target).empty()
        $.ajax({
            url: "{{ route('V1.general.brands') }}",
            data: {
                product_type_id: product_type_id,
            },
            type: "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', x_api_key);
                xhr.setRequestHeader('Authorization', `Bearer ${access_token}`);
            },
            success: function(resp) {
                var optionsAsString = "<option value='' data-slug=''>Select Make</option>";
                if (resp.success) {
                    var data = resp.data
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            selected = prevValue == data[i].id ? 'selected' : '';
                            optionsAsString +=
                                `<option value='${data[i].id}' data-slug='${data[i].slug}' ${selected}>${data[i].name}</option>`;
                        }
                        $(target).append(optionsAsString);
                    }
                } else {
                    dNoti("Something Went Wrong", "error")
                }
            },
            error: function(request, error) {
                if(request.statusCode().status == 401) {
                    logout()
                }
            }
        });
    }

    getModels = (brand_id, target, productTypeTarget, prevValue = undefined) => {
        var product_type_id =   $(productTypeTarget).val()
        $(target).empty()
        $.ajax({
            url: "{{ route('V1.general.models') }}",
            data: {
                brand_id: brand_id,
                product_type_id: product_type_id,
            },
            type: "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', x_api_key);
                xhr.setRequestHeader('Authorization', `Bearer ${access_token}`);
            },
            success: function(resp) {
                var optionsAsString = "<option value='' data-slug=''>Select Model</option>";
                if (resp.success) {
                    var data = resp.data
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            selected = prevValue == data[i].id ? 'selected' : '';
                            optionsAsString +=
                                `<option value='${data[i].id}' data-slug='${data[i].slug}' ${selected}>${data[i].name}</option>`;
                        }
                        $(target).append(optionsAsString);
                    }
                } else {
                    dNoti("Something Went Wrong", "error")
                }
            },
            error: function(request, error) {
                if(request.statusCode().status == 401) {
                    logout()
                }
            }
        });
    }

    getGeneralData = (target, type = undefined, firstText = undefined, prevValue = undefined) => {
        if(!type)
            return false
        
        var url = getUrl(type)
        
        $(target).empty()
        $.ajax({
            url: url,
            data: {},
            type: "GET",
            beforeSend: function(xhr) {
                xhr.setRequestHeader('X-API-KEY', x_api_key);
                xhr.setRequestHeader('Authorization', `Bearer ${access_token}`);
            },
            success: function(resp) {
                var optionsAsString = `<option value=''>Select ${firstText}</option>`;
                if (resp.success) {
                    var data = resp.data
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            selected = prevValue == data[i].id ? 'selected' : '';
                            optionsAsString +=
                                `<option value='${data[i].id}' ${selected}>${data[i].name}</option>`;
                        }
                        $(target).append(optionsAsString);
                    }
                } else {
                    dNoti("Something Went Wrong", "error")
                }
            },
            error: function(request, error) {
                if(request.statusCode().status == 401) {
                    logout()
                }
            }
        });
    }

    getUrl = (type = undefined) => {
        var url =   undefined
        switch (type) {
            case "product-type":
                url =   "{{ route('V1.general.productTypes') }}"
                break;
            case "purchase-type":
                url =   "{{ route('V1.general.purchaseTypes') }}"
                break;
            case "state":
                url =   "{{ route('V1.general.states') }}"
                break;
            case "fuel-type":
                url =   "{{ route('V1.general.fuelTypes') }}"
                break;
            case "color":
                url =   "{{ route('V1.general.colors') }}"
                break;
            case "hp":
                url =   "{{ route('V1.general.hps') }}"
                break;
            case "hour":
                url =   "{{ route('V1.general.hours') }}"
                break;
            case "condition":
                url =   "{{ route('V1.general.conditions') }}"
                break;
            case "require-status":
                url =   "{{ route('V1.general.requireStatus') }}"
                break;
            case "bank":
                url =   "{{ route('V1.general.banks') }}"
                break;
            default:
                break;
        }

        return url;
    }
</script>
