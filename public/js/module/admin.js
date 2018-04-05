/**
 * Created by brt on 29/5/17.
 */

$(document).ready(function () {

    // Base URl
    var baseUrl = $("#admin_url").val();

    // Disabling Double Click
    $("[data-field='status'] *").dblclick(function (e) {
        e.preventDefault();
    });

    // Store Select's value before and after state change
    var preSelect = null,
        postSelect = null;

    // Choice Array
    var status_choice = JSON.parse($("#statuses_enum").val());

    // Dashboard DOM for status
    var dashboard_dom = {
        "open": $(".dash-open-service-count"),
        "closed": $(".dash-closed-service-count"),
        "inprogress": $(".dash-in-progress-count")
    };

    // Get Status Array based on Status Type
    var getStatusArray = function (status_array, status_type) {

        var to_remove = [];

        if (status_type === "inprogress") {
            to_remove = ['Open'];
        } else if (status_type === 'closed') {
            to_remove = ['Open', 'In Progress'];
        }

        return status_array.filter(function (element) {
            if (to_remove.indexOf(element) < 0) {
                return element;
            }
        });
    };

    // Generate Select Element
    var generateSelect = function (dropdown, selected) {

        dropdown = dropdown.map(function (element) {
            if (element === selected) {
                return "<option value='" + element + "' selected>" + element + "</option>";
            }
            return "<option value='" + element + "'>" + element + "</option>";
        }).join("");

        return "<select>" + dropdown + "</select>";

    };

    // Create Select Option in Html
    var toggleSelectHtml = function (choice, dom, selected, arr) {

        // New Select Option
        if (choice) {
            var select_list = generateSelect(arr, selected);
            $(dom).html(select_list)
        } else {
            $(dom).html(selected);
        }

    };

    // Custom Edit / Save Toggle
    (function () {

        // Listen / Edit Save Click
        $(".service-status-edit-save").on('click', function () {

                var check = $(this).children("i").hasClass('closed');

                var status_type = $(this).attr("data-status");

                var dropdown = getStatusArray(status_choice, status_type);

                // Get Service Request ID
                var service_request_id = $(this).attr('id');

                // Splitting and Getting only ID
                service_request_id = service_request_id.split("_").reverse();
                service_request_id = service_request_id[0];

                var request_status = ".request_status_" + service_request_id;

                // isEdit
                if (!check) {

                    var action = $(this).children('i').attr('title');
                    var $element  = $(this);

                    if (action === 'Edit') {
                        $(this)
                            .children('i')
                            .removeClass('fa-pencil')
                            .addClass('fa-save')
                            .attr('title', 'Save');

                        // Get Status
                        preSelect = $(request_status).text();

                        preSelect = (preSelect) ? preSelect.replace(/[^\w\s]/gi, '').replace(" ", "").toLowerCase() : preSelect;

                        // Generate Html
                        toggleSelectHtml(true, request_status, $(request_status).text(), dropdown);

                    } else if (action === 'Save') {

                        $(this)
                            .children('i')
                            .removeClass('fa-save')
                            .addClass('fa-pencil')
                            .attr('title', 'Edit');

                        // Get Selected Value
                        var selected = $(request_status + " select").val();

                        // Replace Select With Selected Value
                        toggleSelectHtml(false, request_status, selected);

                        postSelect = selected.replace(/[^\w\s]/gi, '').replace(" ", "").toLowerCase();

                        // Check if wasInProgress
                        if (!(preSelect === 'inprogress' && postSelect === "open") && preSelect !== postSelect) {
                            // Update status in Server for Service Request
                            $.ajax({
                                type: "POST",
                                url: baseUrl + '/service_request/update',
                                data: {
                                    _token: $("#csrf_token").val(),
                                    service_request_id: service_request_id,
                                    status: selected
                                },
                                success: function (data) {
                                    var check = (data) ? data["success"] : false;

                                    if (check) {
                                        data = data["counts"];
                                        var open = data['Open'],
                                            closed = data['Closed'],
                                            in_progress = data['In Progress'];

                                        // Update Count
                                        $(".dash-open-service-count").text(open.length);
                                        $(".dash-closed-service-count").text(closed.length);
                                        $(".dash-in-progress-count").text(in_progress.length);

                                        // Remove Row isStatusClosed
                                        if (postSelect !== preSelect) {
                                            $element.closest('tr').slideUp().remove();
                                        }

                                        alert("Status Updated!");
                                    } else {
                                        alert("Sorry Status failed!")
                                    }
                                },
                                error: function (xhr, status) { // error callback
                                    switch (status) {
                                        case 404:
                                            console.log('File not found');
                                            break;
                                        case 500:
                                            console.log('Server error');
                                            break;
                                        case 0:
                                            console.log('Request aborted');
                                            break;
                                        default:
                                            console.log('Unknown error ' + status);
                                    }
                                }
                            }).done(function () {
                                postSelect = null;
                                preSelect = null;
                            });
                        }
                    }
                }
            }
        );

    })();

    // On Change Check Select
    (function () {
        var previous, next, p_val, n_val;

        $(document).on('focus', 'select', function () {
            // Get Previous Value
            previous = this.value;

            p_val = previous.replace(/[^\w\s]/gi, '').replace(" ", "").toLowerCase();

            if (p_val === "inprogress") {
                for (var i = 0; i < this.length; i++) {
                    if (this.options[i].value === 'Open')
                        this.remove(i);
                }
            }

        }).on('change', 'select', function () {
            // Get Selected Value
            next = this.value;

            n_val = next.replace(/[^\w\s]/gi, '').replace(" ", "").toLowerCase();

            if (p_val === 'inprogress' && n_val === "open") {
                this.value = previous;
                alert("Sorry!, In Progress request cannot be changed to Open");
                return false;
            }

        });
    })();

    // Initiating Data table
    $('table').DataTable({
        "language": {
            "emptyTable": "No Requests Available."
        },
        "order": [[1, 'desc']]
    });

    /** Manually Showing No Data available in region tabs */
    // On nav-tab chosen
    $('.region-nav-tab-toggle').click(function (e) {
        checkTableRowAvail($(this));
    });

    // Checking Table rows availability
    var checkTableRowAvail = function (dom) {
        var tab_id = dom.attr('href');
        var table = $(tab_id);
        var table_rows_count = $(tab_id + " table tr").length - 1;

        // Check if table isEmpty
        if (table_rows_count <= 0) {
            table.html("<p>No Data available.</p>")
        }
    };

    // init
    (function () {
        checkTableRowAvail($('.region-nav-tab-toggle'));
    })();

});
/** ****************************************************/