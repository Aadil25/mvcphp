jQuery.ajaxSetup({
    data: {
        ajax: "1"
    }
});
var Ccc = {};
var Core = {};
Core.Methods = function() {};
Core.Methods.prototype = {
    _URL: null,
    _form: null,
    _useType: "form",
    _requestMethod: "post",
    _requestParameters: {},
    _element: null,
    _message: null,
    _errorMessage: null,
    _successMessage: null,
    _noticeMessage: null,
    _successText: "success",
    _failureText: "failure",
    _popupTrue: "false",
    redirect: {
        ajax: "ajax",
        location: "location"
    },
    _validateKeysOriginal: {
        common: "--",
        email: "--",
        firstname: "--",
        lastname: "--",
        company_name: "--",
        first_name: "--",
        last_name: "--",
        email: "--",
        phone_number: "--",
        bank_id: "--",
        creditcard_type_id: "--",
        account_type: "--",
        account_number: "--",
        pin: "--",
        balance: "--",
        birth_date: "--",
        notes: "--",
        country: "--",
        state: "--",
        zip_code: "--",
        is_salable: "--",
        is_default: "--",
        cron_expr: "--",
        job_code: "--",
        model: "--",
        description: "--",
        status: "--",
        name: "--",
        access_key: "--",
        field_type: "--",
        system_config_group_id: "--",
        value: "--",
        airline_id: "--",
        password: "--"
    },
    _validateKeys: {
        common: "--",
        email: "--",
        firstname: "--",
        lastname: "--",
        company_name: "--",
        first_name: "--",
        last_name: "--",
        email: "--",
        phone_number: "--",
        bank_id: "--",
        creditcard_type_id: "--",
        account_type: "--",
        account_number: "--",
        pin: "--",
        balance: "--",
        birth_date: "--",
        notes: "--",
        country: "--",
        state: "--",
        zip_code: "--",
        is_salable: "--",
        is_default: "--",
        cron_expr: "--",
        job_code: "--",
        model: "--",
        description: "--",
        status: "--",
        name: "--",
        access_key: "--",
        field_type: "--",
        system_config_group_id: "--",
        value: "--",
        airline_id: "--",
        password: "--"
    },
    setRequestMethod: function(e) {
        if (!e) {
            alert("Request Method should not be empty.");
            return false
        }
        if (e == "get") {
            this._requestMethod = e
        } else {
            this._requestMethod = "post"
        }
        return this
    },
    getRequestMethod: function() {
        return this._requestMethod
    },
    setRequestParameters: function(e) {
        if (!e) {
            alert("Request Method should not be empty.");
            return false
        }
        if (typeof e == "string") {
            this._requestParameters = e
        } else {
            this._requestParameters = {}
        }
        return this
    },
    getRequestParameters: function() {
        return this._requestParameters
    },
    clearRequestParameters: function() {
        this._requestParameters = {};
        return this
    },
    setUseType: function(e) {
        if (!e) {
            alert("Use Type should not be empty.");
            return false
        }
        if (e == "url") {
            this._useType = e
        } else {
            this._useType = "form"
        }
        return this
    },
    getUseType: function() {
        return this._useType
    },
    setForm: function(e) {
        if (!e) {
            alert("form elementId should not be empty.");
            return false
        }
        if ($(e)) {
            this._form = jQuery("#" + e);
            return this
        }
        return false
    },
    getForm: function() {
        if (!this._form) {
            alert("Unable to load form object.")
        }
        return this._form
    },
    setMessage: function(e) {
        if (!e) {
            alert("Message should not be empty.");
            return false
        }
        this._message = e;
        return this
    },
    getMessage: function() {
        if (!this._message) {
            alert("Message should not be empty")
        }
        return this._message
    },
    setErrorMessage: function(e) {
        if (!e || typeof e != "string") {
            alert("Error Message should not be empty and must be a string.");
            return false
        }
        this._errorMessage = e;
        return this
    },
    getErrorMessage: function() {
        return this._errorMessage
    },
    clearErrorMessage: function() {
        this._errorMessage = null;
        return this
    },
    setSuccessMessage: function(e) {
        if (!e || typeof e != "string") {
            alert("Success Message should not be empty and must be a string.");
            return false
        }
        this._successMessage = e;
        return this
    },
    getSuccessMessage: function() {
        return this._successMessage
    },
    clearSuccessMessage: function() {
        this._successMessage = null;
        return this
    },
    setNoticeMessage: function(e) {
        if (!e || typeof e != "string") {
            alert("Notice Message should not be empty and must be a string.");
            return false
        }
        this._noticeMessage = e;
        return this
    },
    getNoticeMessage: function() {
        return this._noticeMessage
    },
    clearNoticeMessage: function() {
        this._noticeMessage = null;
        return this
    },
    alertMessage: function() {
        if (this.getErrorMessage()) {
            var e = new Core.Message;
            if (e.setMessageType("error")) {
                e.setMessage(this.getErrorMessage()).show();
                this.clearErrorMessage()
            }
        }
        if (this.getSuccessMessage()) {
            var e = new Core.Message;
            if (e.setMessageType("success")) {
                e.setMessage([this.getSuccessMessage()]).show();
                this.clearSuccessMessage()
            }
        }
        if (this.getNoticeMessage()) {
            var e = new Core.Message;
            if (e.setMessageType("notice")) {
                e.setMessage([this.getNoticeMessage()]).show();
                this.clearNoticeMessage()
            }
        }
    },
    setURL: function(e) {
        if (!e) {
            alert("URL should not be empty.");
            return false
        }
        this._URL = e;
        if (e.indexOf("ajax=1") == -1) {
            this._URL = this._URL + "?ajax=1"
        }
        return this
    },
    getURL: function() {
        if (!this._URL) {
            alert("Unable to load URL string.")
        }
        return this._URL
    },
    setElement: function(e) {
        if (!e || typeof e == "undefined") {
            alert("elementId should not be empty.");
            return false
        }
        if (typeof e == "object") {
            this._element = e;
            return this
        } else if (typeof e == "string") {
            if (jQuery("#" + e).length) {
                this._element = jQuery("#" + e);
                return this
            }
        }
        return false
    },
    getElement: function() {
        if (!this._element) {
            alert("Unable to assign object into _element variable.")
        }
        return this._element
    },
    loadScript: function(e, t) {
        if (typeof t == "undefined") {
            if (typeof e == "string") {
                jQuery.getScript(e)
            }
        }
    },
    loadPage: function() {
        if (this.getUseType() == "url") {
            this._loadPageUsingURL()
        } else {
            this._loadPageUsingForm()
        }
        this.clearRequestParameters()
    },
    _loadPageUsingURL: function() {
        var e = new Core.Loader;
        e.show({
            waiting_text: "Please wait..."
        });
        var t = this;
        t.setUseType("form");
        jQuery.ajax({
            type: this.getRequestMethod(),
            url: this.getURL(),
            data: this.getRequestParameters(),
            dataType: "json",
            success: function(e) {
                if (e.responseType == t._successText) {
                    if (typeof e.redirectURL != "undefined") {
                        if (e.redirectType == t.redirect.location) {
                            window.location = e.redirectURL
                        } else {
                            t.setURL(e.redirectURL).setUseType("url").loadPage()
                        }
                    } else {
                        t.manageHtml(e)
                    }
                } else if (e.responseType == t._failureText) {
                    if (typeof e.redirectURL != "undefined") {
                        if (e.redirectType == t.redirect.location) {
                            window.location = e.redirectURL
                        } else {
                            t.setURL(e.redirectURL).setUseType("url").loadPage()
                        }
                    }
                    t.setErrorMessage(e.message);
                    t.alertMessage()
                }
            },
            error: function() {},
            complete: function() {
                e.hide()
            }
        })
    },
    _loadPageUsingForm: function() {
        var e = new Core.Loader;
        e.show({
            waiting_text: "Please wait..."
        });
        var t = this;
        this.setURL(this.getForm().attr("action"));
        this.setRequestMethod(this.getForm().attr("method"));
        this.setRequestParameters(this.getForm().serialize());
        jQuery.ajax({
            type: this.getRequestMethod(),
            url: this.getURL(),
            data: this.getRequestParameters(),
            dataType: "json",
            success: function(e) {
                if (e.responseType == t._successText) {
                    if (typeof e.redirectURL != "undefined") {
                        if (e.redirectType == t.redirect.location) {
                            window.location = e.redirectURL
                        } else {
                            if (e.message) {
                                t.setSuccessMessage(e.message)
                            }
                            t.setURL(e.redirectURL).setUseType("url").loadPage()
                        }
                    } else {
                        t.manageHtml(e)
                    }
                } else if (e.responseType == "showError") {
                    t.setErrorMessage(e.message);
                    t.alertMessage();
                    jQuery.each(e.errorIds.error, function(e, t) {
                        jQuery("#row-" + t).addClass("selected_row")
                    });
                    jQuery.each(e.errorIds.success, function(e, t) {
                        jQuery("#row-" + t).removeClass("selected_row");
                        jQuery("#row-" + t).addClass("selected_succeed_row")
                    });
                    jQuery.each(e.errorIds.notProcess, function(e, t) {
                        jQuery("#row-" + t).removeClass("selected_row");
                        jQuery("#row-" + t).removeClass("selected_succeed_row")
                    })
                } else if (e.responseType == t._failureText) {
                    if (typeof e.redirectURL != "undefined") {
                        if (e.redirectType == t.redirect.location) {
                            window.location = e.redirectURL
                        } else {
                            t.setURL(e.redirectURL).setUseType("url").loadPage()
                        }
                    }
                    validation = new Core.Validation;
                    validation.printError(t._validateKeys, t._validateKeysOriginal, e.message)
                }
            },
            complete: function() {
                e.hide()
            }
        })
    },
    manageHtml: function(e) {
        var t = this;
        if (typeof e.content == "object") {
            jQuery(e.content).each(function(e, n) {
                if (typeof n.element == "string") {
                    if (jQuery("#" + n.element).length) {
                        if (t.getSuccessMessage()) {
                            t.alertMessage()
                        }
                        if (typeof n.display == "undefined") {
                            if (typeof n.html != "undefined") {
                                jQuery("#" + n.element).html(n.html)
                            }
                            jQuery("#" + n.element).show()
                        } else if (n.display == false) {
                            jQuery("#" + n.element).hide()
                        }
                    }
                }
                if (typeof n.content === "object") {
                    t.manageHtml(n)
                }
            })
        } else if (typeof e.content == "string") {
            t.getElement().html(e.content)
        }
    },
    setFormURL: function(e) {
        this.setURL(e);
        if (this.getForm()) {
            if (this.getURL()) {
                this.getForm().attr("action", this.getURL());
                return this
            }
        }
        return false
    },
    getFormURL: function() {
        if (this.getForm()) {
            return this.getForm().attr("action")
        }
        return false
    }
};
Core.Layout = function() {};
Core.Layout.prototype = {
    id: "ccc-layout",
    setting: {
        width: "220px",
        height: "40px",
        opacity: 0,
        background: "#ffffff",
        zIndex: 1e3,
        top: "0px",
        left: "0px"
    },
    enable: function(e) {
        if (typeof e == "object") {
            jQuery.extend(this.setting, e)
        }
        this.getHtml()
    },
    getHtml: function() {
        var e = '<div id="' + this.id + '" style="position:fixed; background:' + this.setting.background + "; height:" + this.setting.height + "; width:" + this.setting.width + "; z-index:" + this.setting.zIndex + "; top:" + this.setting.top + ";left:" + this.setting.left + '; display:none;">';
        e += "</div>";
        if (jQuery("#" + this.id).length == 0) {
            jQuery("body").append(e)
        }
        jQuery("#" + this.id).css({
            opacity: this.setting.opacity,
            width: jQuery(window).width() + "px",
            height: jQuery(document).height() + "px",
            display: "block"
        })
    },
    disable: function() {
        jQuery("#" + this.id).hide()
    }
};
Core.Loader = function() {};
Core.Loader.prototype = {
    elementId: "loader-div",
    elementClass: "loader-div",
    settings: {
        waiting_text: "Please wait...",
        opacity: .95,
        top: "180px",
        left: "100px",
        delaytime: 1
    },
    setElementId: function(e) {
        e = jQuery.trim(e);
        if (!e || typeof e != "string") {
            alert("ElementId should not be empty");
            return false
        }
        this.elementId = e;
        return this
    },
    getElementId: function() {
        return this.elementId
    },
    getElement: function() {
        if (jQuery("#" + this.elementId).length == 0) {
            this.elementId = "loader-div" + Math.floor(Math.random() * 1e4 + 1);
            var e = document.createElement("div");
            jQuery(e).attr("id", this.elementId);
            jQuery(e).attr("class", this.elementClass);
            jQuery("body").append(e);
            return jQuery(e)
        } else {
            return jQuery("#" + this.elementId)
        }
    },
    show: function(e) {
        Core.Layout.prototype.enable();
        if (typeof e == "object") {
            jQuery.extend(this.settings, e)
        }
        this.getHtml();
        this.settings.left = jQuery(window).width() / 2 - jQuery("#" + this.elementId).width() / 2 + "px";
        this.settings.top = jQuery(window).height() / 2 - jQuery("#" + this.elementId).height() / 2 - 50 + "px";
        jQuery("#" + this.elementId).css({
            left: this.settings.left,
            top: this.settings.top,
            opacity: this.settings.opacity,
            display: "block"
        })
    },
    getHtml: function() {
        element = this.getElement();
        element.html(this.settings.waiting_text)
    },
    hide: function() {
        jQuery("#" + this.elementId).hide();
        Core.Layout.prototype.disable()
    }
};
Core.Message = function() {};
Core.Message.prototype = {
    elementId: "message",
    elementClassName: "message",
    messageType: "success",
    messageTypeList: {
        success: "success",
        notice: "notice",
        error: "error"
    },
    settings: {
        opacity: .95,
        top: "180px",
        left: "100px",
        delaytime: 100
    },
    setElementId: function(e) {
        e = jQuery.trim(e);
        if (!e || typeof e != "string") {
            alert("ElementId should not be empty");
            return false
        }
        this.elementId = e;
        return this
    },
    getElementId: function() {
        return this.elementId
    },
    getElementClassName: function() {
        return this.elementClassName
    },
    setMessageType: function(e) {
        e = jQuery.trim(e);
        if (!e || typeof e != "string") {
            alert("messageType should not be empty");
            return false
        }
        if (e != this.messageTypeList.success && e != this.messageTypeList.notice && e != this.messageTypeList.error) {
            alert("messageType is not valid.");
            return false
        }
        this.messageType = e;
        return this
    },
    getMessageType: function() {
        return this.messageType
    },
    getElement: function() {
        var e = jQuery("#" + this.getElementId() + " ." + this.getMessageType());
        if (e.length == 0) {
            alert('Message Element "' + this.getElementId() + " ." + this.getMessageType() + '" does not exists.');
            return false
        }
        return e
    },
    setMessage: function(e) {
        this.messages = e;
        return this
    },
    getMessage: function() {
        var html = "";
        jQuery.each(eval(this.messages), function(e, t) {
            html += "<li>&nbsp;" + t + "</li>"
        });
        return html
    },
    show: function(e) {
        var t = this;
        if (typeof e == "object") {
            jQuery.extend(this.settings, e)
        }
        this.settings.left = jQuery(window).width() / 2 - jQuery("#" + this.id).width() / 2 + "px";
        this.settings.top = jQuery(window).height() / 2 - jQuery("#" + this.id).height() / 2 - 50 + "px";
        this.getElement().html(this.getMessage());
        this.getElement().css({
            left: this.settings.left,
            top: this.settings.top,
            opacity: this.settings.opacity
        }).fadeIn(this.settings.delaytime);
        setTimeout(function() {
            t.hide()
        }, 15e3)
    },
    hide: function() {
        this.getElement().fadeOut(this.settings.delaytime)
    }
};
Core.Popup = function() {};
Core.Popup.prototype = {
    _content_dialog: null,
    _message_dialog: null,
    _confirm_dialog: null,
    setContentDialog: function(e) {
        this._content_dialog = e
    },
    getContentDialog: function() {
        return jQuery("#" + this._content_dialog)
    },
    isContentDialogExist: function() {
        if (jQuery("#" + this._content_dialog)) {
            return true
        }
        return false
    },
    setMessageDialog: function(e) {
        this._message_dialog = e
    },
    getMessageDialog: function() {
        return jQuery("#" + this._message_dialog)
    },
    isMessageDialogExist: function() {
        if (jQuery("#" + this._message_dialog)) {
            return true
        }
        return false
    },
    isConfirmDialogExist: function() {
        if (jQuery("#" + this._confirm_dialog)) {
            return true
        }
        return false
    },
    getConfirmDialog: function() {
        return jQuery("#" + this._confirm_dialog)
    },
    setConfirmDialog: function(e) {
        this._confirm_dialog = e
    }
};
Core.Grid = function() {};
Core.Grid.prototype = jQuery.extend(new Core.Methods, {
    checkSingleClassName: "check_single",
    checkedElements: [],
    allElements: [],
    canPrintcheckedElements: true,
    countElement: "row-count",
    canPrintcheckedElementCount: true,
    _totalRequest: 0,
    _currentRequest: 0,
    _totalRecordCount: 0,
    _processedRecords: 0,
    _Ids: [],
    _exportFileName: null,
    _exportType: null,
    setCountElement: function(e) {
        this.countElement = e;
        return this
    },
    getCountElement: function() {
        if (!this.countElement) {
            alert('"countElement" should not be empty.');
            return false
        }
        return this.countElement
    },
    printCheckedElementCount: function() {
        if (!jQuery("#" + this.getCountElement()).length) {
            alert('"countElement" is not found in document.');
            return false
        }
        if (this.canPrintcheckedElementCount) {
            jQuery("#" + this.getCountElement()).html(this.getCheckedElementCount() + " / " + this.getAllElementCount())
        }
        return this
    },
    getAllElementCount: function() {
        return this.getAllElements().length
    },
    getCheckedElementCount: function() {
        return this.getCheckedElements().length
    },
    setPrintCheckedElements: function(e) {
        this.canPrintcheckedElements = e;
        return this
    },
    setPrintCheckedElementCount: function(e) {
        this.canPrintcheckedElementCount = e;
        return this
    },
    printCheckedElements: function() {
        if (this.canPrintcheckedElements) {
            jQuery("#elementJsonString").html(this.checkedElements.join(", "))
        }
        return this
    },
    getCheckSingleClassName: function() {
        if (!this.checkSingleClassName) {
            alert('"className" should not be empty.');
            return false
        }
        return this.checkSingleClassName
    },
    setCheckSingleClassName: function(e) {
        this.checkSingleClassName = e;
        return this
    },
    getCheckSingleObject: function() {
        if (jQuery("." + this.getCheckSingleClassName()).length == 0) {
            return false
        }
        return jQuery("." + this.getCheckSingleClassName())
    },
    getAllElements: function() {
        return this.allElements
    },
    getCheckedElements: function() {
        return this.checkedElements
    },
    setCheckedElements: function(e) {
        if (typeof e != "object") {
            alert("elements must be array");
            return false
        }
        if (this.getAllElements().length == 0) {
            return false
        }
        for (i = 0; i < e.length; i++) {
            var t = jQuery(this.getAllElements()).index(parseInt(e[i]));
            if (t != -1) {
                this.checkedElements.push(parseInt(e[i]))
            }
        }
        this.printCheckedElements();
        this.printCheckedElementCount();
        return this
    },
    resetCheckedElements: function() {
        this.checkedElements = [];
        return this
    },
    setAllElements: function(e) {
        this.allElements = [];
        if (typeof e != "object") {
            alert("elements must be array")
        }
        for (i = 0; i < e.length; i++) {
            this.allElements.push(parseInt(e[i]))
        }
        return this
    },
    checkVisibleCheckbox: function(e) {
        var t = this;
        var n = this.getCheckSingleObject();
        if (n.length) {
            n.each(function(n, r) {
                var i = jQuery(t.getCheckedElements()).index(parseInt(r.value));
                if (e && i != -1) {
                    jQuery(r).attr("checked", e)
                } else if (!e && i == -1) {
                    jQuery(r).attr("checked", e)
                }
            })
        }
        return this
    },
    selectAll: function() {
        var e = this;
        this.resetCheckedElements();
        jQuery(this.getAllElements()).each(function(t, n) {
            e.checkedElements.push(n)
        });
        this.checkVisibleCheckbox(true);
        this.printCheckedElements();
        this.printCheckedElementCount();
        return this
    },
    unselectAll: function() {
        this.resetCheckedElements();
        this.checkVisibleCheckbox(false);
        this.printCheckedElements();
        this.printCheckedElementCount();
        return this
    },
    selectVisible: function() {
        var e = this;
        this.resetCheckedElements();
        var t = this.getCheckSingleObject();
        if (t.length) {
            t.each(function(t, n) {
                e.checkedElements.push(parseInt(n.value))
            })
        }
        this.checkVisibleCheckbox(true);
        this.printCheckedElements();
        this.printCheckedElementCount();
        return this
    },
    unselectVisible: function() {
        var e = this;
        var t = this.getCheckSingleObject();
        if (t.length) {
            t.each(function(t, n) {
                var r = jQuery(e.getCheckedElements()).index(parseInt(n.value));
                if (r != -1) {
                    e.getCheckedElements().splice(r, 1)
                }
            })
        }
        this.checkVisibleCheckbox(false);
        this.printCheckedElements();
        this.printCheckedElementCount();
        return this
    },
    checkSingle: function(e) {
        var t = jQuery(this.getCheckedElements()).index(parseInt(e.value));
        if (e.checked) {
            if (t == -1) {
                this.getCheckedElements().push(parseInt(e.value))
            }
        } else {
            if (t != -1) {
                this.getCheckedElements().splice(t, 1)
            }
        }
        this.printCheckedElements();
        this.printCheckedElementCount();
        return this
    },
    exportGrid: function() {
        if (!this.setSelectedId()) {
            return this
        }
        var e = "POST";
        if (this.getForm()) {
            var t = new Core.Loader;
            t.show();
            var n = this;
            jQuery.ajax({
                type: this.getForm().attr("method"),
                url: this.getFormURL(),
                data: this.getForm().serialize(),
                dataType: "json",
                success: function(e) {
                    if (e.responseType == n._successText) {
                        t.hide();
                        n._totalRequest = e.totalRequest;
                        n._currentRequest = 0;
                        n._totalRecordCount = e.totalRecordCount;
                        n._Ids = e.data;
                        n._exportFileName = e.exportFileName;
                        n._exportType = e.exportType;
                        n.setFormURL(e.redirectURL).prepareExport()
                    } else if (e.responseType == n._failureText) {
                        t.hide();
                        n.setErrorMessage(e.message);
                        n.alertMessage()
                    }
                }
            })
        }
    },
    prepareExport: function() {
        if (this.getForm()) {
            var e = this;
            var t = new Core.Loader;
            t.show({
                waiting_text: "Processed Records " + e._processedRecords + " / " + e._totalRecordCount
            });
            jQuery.ajax({
                type: this.getForm().attr("method"),
                url: this.getFormURL(),
                data: {
                    ids: e._Ids[e._currentRequest],
                    exportFileName: e._exportFileName,
                    exportType: e._exportType,
                    processedRecords: e._processedRecords
                },
                dataType: "json",
                success: function(n) {
                    if (n.responseType == e._successText) {
                        t.hide();
                        e._currentRequest = e._currentRequest + 1;
                        e._processedRecords = n.processedRecords;
                        if (e._currentRequest == e._totalRequest) {
                            if (jQuery("#exportFileName").length) {
                                jQuery("#exportFileName").val(e._exportFileName)
                            } else {
                                e.setErrorMessage("Element Not Set for Export FIlename.");
                                e.alertMessage()
                            }
                            e._processedRecords = 0;
                            e.setFormURL(n.redirectURL).finalExportGrid()
                        } else {
                            e.prepareExport()
                        }
                    } else if (n.responseType == e._failureText) {
                        t.hide();
                        e.setErrorMessage(n.message);
                        e.alertMessage()
                    }
                }
            })
        }
    },
    finalExportGrid: function() {
        var e = "POST";
        this.getForm().submit()
    },
    confirmDelete: function(e) {
        if (!this.setSelectedId()) {
            return this
        }
        if (confirm(e)) {
            if (!this.getForm()) {
                return this
            }
            this.loadPage();
            this.checkedElements = []
        }
        return this
    },
    setSelectedId: function() {
        if (this.getCheckedElements().length == 0) {
            alert(this.getMessage());
            return false
        }
        if (jQuery("#selectedIds").length == 0) {
            alert('Hidden "selectedIds" element is not found in document');
            return false
        }
        jQuery("#selectedIds").val(this.getCheckedElements().join(", "));
        return this
    }
});
Core.Tab = function() {};
Core.Tab.prototype = {
    headerClassName: "tabHeader",
    contentClassName: "tabContent",
    defaultEnabledHeaderIndex: 0,
    processType: "html",
    processTypes: {
        html: "html",
        ajax: "ajax"
    },
    setHeaderClassName: function(e) {
        e = jQuery.trim(e);
        if (!e || typeof e == "undefined") {
            alert("HeaderClassName should not be null.");
            return false
        }
        this.headerClassName = e;
        return this
    },
    getHeaderClassName: function() {
        if (!this.headerClassName) {
            alert("HeaderClassName is not set.");
            return false
        }
        return this.headerClassName
    },
    getHeaderObject: function() {
        if (jQuery("." + this.getHeaderClassName()).length == 0) {
            alert("HeaderClassName element is not found in document.");
            return false
        }
        return jQuery("." + this.getHeaderClassName())
    },
    setContentClassName: function(e) {
        e = jQuery.trim(e);
        if (!e || typeof e == "undefined") {
            alert("ContentClassName should not be null.");
            return false
        }
        this.contentClassName = e;
        return this
    },
    getContentClassName: function() {
        if (!this.contentClassName) {
            alert("ContentClassName is not set.");
            return false
        }
        return this.contentClassName
    },
    getContentObject: function() {
        if (jQuery("." + this.getContentClassName()).length == 0) {
            alert("ContentClassName element is not found in document.");
            return false
        }
        return jQuery("." + this.getContentClassName())
    },
    setDefaultHeaderIndex: function(e) {
        if (typeof e != "number" || e < 0) {
            alert("DefaultEnabledHeaderIndex must be a number.");
            return false
        }
        this.defaultEnabledHeaderIndex = e;
        return this
    },
    getDefaultHeaderIndex: function() {
        if (typeof this.defaultEnabledHeaderIndex !== "number") {
            alert("DefaultEnabledHeaderIndex is not set.");
            return false
        }
        return this.defaultEnabledHeaderIndex
    },
    setProcessType: function(e) {
        e = jQuery.trim(e);
        if (e != this.processTypes.html && e != this.processTypes.ajax) {
            alert("ProcessType is not valid.");
            return false
        }
        this.processType = e;
        return this
    },
    getProcessType: function() {
        if (!this.processType) {
            alert("ProcessType is not set.");
            return false
        }
        return this.processType
    },
    setupTab: function() {
        if (this.getHeaderObject().length !== this.getContentObject().length) {
            var e = "Header and Content elements length must be same for Tab feature.\n";
            e += "You have set " + this.getHeaderObject().length + " header elements and " + this.getContentObject().length + " content elements.";
            alert(e);
            return false
        }
        this._call()
    },
    _call: function(e) {
        var t = this;
        t.getHeaderObject().click(function() {
            t.getHeaderObject().each(function(e, n) {
                t.getHeaderObject().eq(e).removeClass("active")
            });
            t.getContentObject().each(function(e, n) {
                t.getContentObject().eq(e).removeClass("active");
                t.getContentObject().eq(e).hide()
            });
            var e = t.getHeaderObject().index(this);
            if (t.getHeaderObject().eq(e).attr("id") == t.processTypes.html) {
                t.getHeaderObject().eq(e).addClass("active")
            } else {
                t.setProcessType("url").setURL(t.getHeaderObject().eq(e).attr("href")).loadPage()
            }
            t.getContentObject().eq(e).addClass("active");
            t.getContentObject().eq(e).show();
            return false
        });
        t.getHeaderObject().each(function(e, n) {
            t.getHeaderObject().eq(e).removeClass("active")
        });
        t.getContentObject().each(function(e, n) {
            t.getContentObject().eq(e).removeClass("active");
            t.getContentObject().eq(e).hide()
        });
        var e = t.getDefaultHeaderIndex();
        if (t.getHeaderObject().eq(e).attr("id") == this.processTypes.html) {
            t.getHeaderObject().eq(e).addClass("active")
        } else {
            t.setProcessType("url").setURL(t.getHeaderObject().eq(e).attr("href")).loadPage()
        }
        t.getContentObject().eq(e).addClass("active");
        t.getContentObject().eq(e).show()
    }
};
Core.Login = function() {};
Core.Login.prototype = jQuery.extend(new Core.Methods, {
    processLogin: function() {
        if (this.getForm()) {
            var e = this;
            var t = new Core.Loader;
            t.show();
            jQuery.ajax({
                type: this.getForm().attr("method"),
                url: this.getForm().attr("action"),
                data: this.getForm().serialize(),
                dataType: "json",
                success: function(t) {
                    if (t.responseType == e._successText) {
                        window.location.href = t.redirectUrl
                    } else if (t.responseType == e._failureText) {
                        alert(t.message)
                    }
                },
                complete: function() {
                    t.hide()
                }
            })
        }
    }
});
Ccc.Admin = function() {};
Ccc.Admin.prototype = jQuery.extend(new Core.Grid, {});
Ccc.System_Config = function() {};
Ccc.System_Config.prototype = jQuery.extend(new Core.Grid, {});
Ccc.System_Config_Group = function() {};
Ccc.System_Config_Group.prototype = jQuery.extend(new Core.Grid, {});
Ccc.Cache = function() {};
Ccc.Cache.prototype = jQuery.extend(new Core.Grid, {});
Ccc.User = function() {};
Ccc.User.prototype = jQuery.extend(new Core.Grid, {});
Ccc.Customer_Contact = function() {};
Ccc.Customer_Contact.prototype = jQuery.extend(new Core.Grid, {});

Ccc.Role = function() {};
Ccc.Role.prototype = jQuery.extend(new Core.Grid, {
    getResources: function(e, t) {
        if (e == "custom") {
            this.setUseType("url");
            this.setURL(t);
            this.loadPage()
        } else {
            jQuery("#resources-list").html("")
        }
        return this
    },
    save: function() {
        if (this.getCheckedElements()) {
            jQuery("#selectedIds").val(this.getCheckedElements().join(","))
        }
        this.loadPage();
        return this
    }
});
Ccc.Resource = function() {};
Ccc.Resource.prototype = jQuery.extend(new Core.Grid, {
    deleteResource: function(e) {
        if (confirm(e)) {
            this.loadPage()
        }
        return this
    }
});
Ccc.Customer = function() {};
Ccc.Customer.prototype = jQuery.extend(new Core.Grid, {
    _content_dialog: "popup-container",
    _dialogTitle: "Dialog",
    _processForm: null,
    _processSaveUrl: null,
    setContentDialog: function(e) {
        if (!e) {
            alert("dialog name should not be empty.")
        }
        this._content_dialog = e;
        return this
    },
    setTitle: function(e) {
        if (!e) {
            alert("title should not be empty.")
        }
        this._dialogTitle = e;
        return this
    },
    setProcessForm: function(e) {
        if (!e) {
            alert("form elementId should not be empty.");
            return false
        }
        this._processForm = e;
        return this
    },
    getProcessForm: function() {
        if (!this._processForm) {
            alert("Unable to load form object.")
        }
        return this._processForm
    },
    processSave: function() {
        this.setForm(this.getProcessForm());
        var e = new Core.Loader;
        var t = this;
        jQuery.ajax({
            type: "POST",
            url: this.getForm().attr("action"),
            data: this.getForm().serialize(),
            dataType: "json",
            success: function(n) {
                if (n.responseType == t._successText) {
                    t.closePopup();
                    t.setSuccessMessage(n.message);
                    t.setURL(n.redirectURL).setUseType("url").loadPage()
                } else if (n.responseType == t._failureText) {
                    e.hide();
                    MESSAGE.setMessage(n.message);
                    MESSAGE.setMessageType("error");
                    MESSAGE.setElementId("error-message");
                    MESSAGE.show()
                }
            }
        })
    },
    openPopup: function() {
        var e = this;
        var t = jQuery("<div />").appendTo("body");
        t.attr("id", e._content_dialog);
        t.attr("title", e._dialogTitle);
        e.loadPage();
        var n = new Core.Popup;
        n.setContentDialog(e._content_dialog);
        var r = n.getContentDialog();
        var i = {
            close: function() {
                if (jQuery(r)) {
                    jQuery(r).remove();
                    MESSAGE.setElementId("message")
                }
            }
        };
        jQuery(r).dialog(i, {
            autoOpen: false,
            height: 480,
            width: 600,
            resizable: false,
            modal: true,
            buttons: {
                Save: function() {
                    e.processSave()
                },
                Cancel: function() {
                    jQuery(r).dialog("close");
                    if (jQuery(r)) {
                        jQuery(r).remove()
                    }
                }
            }
        });
        jQuery(r).dialog("open")
    },
    closePopup: function() {
        var e = new Core.Popup;
        e.setContentDialog(this._content_dialog);
        var t = e.getContentDialog();
        jQuery(t).dialog("close");
        if (jQuery(t)) {
            jQuery(t).remove()
        }
    },
    _validateKeysOriginal: {
        common: "--",
        email: "--",
        firstname: "--",
        lastname: "--",
        company_name: "--",
        password: "--"
    },
    _validateKeys: {
        common: "--",
        email: "--",
        firstname: "--",
        lastname: "--",
        company_name: "--",
        password: "--"
    },
    saveAccount: function() {
        var e = this;
        var t = new Core.Loader;
        t.show();
        jQuery.ajax({
            type: this.getForm().attr("method"),
            url: this.getForm().attr("action"),
            data: this.getForm().serialize(),
            dataType: "json",
            success: function(t) {
                if (t.responseType == e._successText) {
                    if (typeof t.redirectURL != "undefined") {
                        if (t.redirectType == e.redirect.location) {
                            alert(t.message);
                            if (t.message) {
                                e.setSuccessMessage(t.message)
                            }
                            window.location = t.redirectURL
                        } else {
                            if (t.message) {
                                e.setSuccessMessage(t.message)
                            }
                            e.setURL(t.redirectURL).setUseType("url").loadPage()
                        }
                    } else {
                        e.manageHtml(t)
                    }
                } else if (t.responseType == e._failureText) {
                    validation = new Core.Validation;
                    validation.printError(e._validateKeys, e._validateKeysOriginal, t.message)
                }
            },
            complete: function() {
                t.hide()
            }
        })
    }
});
Ccc.Company_Type = function() {};
Ccc.Company_Type.prototype = jQuery.extend(new Core.Grid, {});
Ccc.Company_Bank = function() {};
Ccc.Company_Bank.prototype = jQuery.extend(new Core.Grid, {
    _validateKeysOriginal: {
        common: "--",
        company_name: "--",
        title: "--",
        phone_number: "--",
        login_url: "--",
        logo: "--",
        address: "--",
        city: "--",
        country: "--",
        state: "--",
        zip_code: "--",
        credit_cards: "--"
    },
    _validateKeys: {
        common: "--",
        company_name: "--",
        title: "--",
        phone_number: "--",
        login_url: "--",
        logo: "--",
        address: "--",
        city: "--",
        country: "--",
        state: "--",
        zip_code: "--",
        credit_cards: "--"
    },
    submitForm: function() {
        current = this;
        jQuery(this.getForm()).ajaxForm({
            dataType: "json",
            success: function(e) {
                if (e.responseType == current._successText) {
                    current.setSuccessMessage(e.message);
                    current.alertMessage();
                    current.setURL(e.redirectURL).setUseType("url").loadPage()
                } else if (e.responseType == current._failureText) {
                    validation = new Core.Validation;
                    validation.printError(current._validateKeys, current._validateKeysOriginal, e.message)
                }
            },
            error: function() {},
            complete: function() {}
        }).submit()
    },
    selectCheckbox: function(e) {
        if (!jQuery("#creditcard_id_" + e).is(":checked")) {
            jQuery("#creditcard_id_" + e).attr("checked", true)
        } else {
            jQuery("#creditcard_id_" + e).removeAttr("checked")
        }
    },
    changeSetting: function(e) {
        window.location = e
    },
    confirmBankDelete: function(e) {
        if (confirm(e)) {
            if (!this.getURL()) {
                return this
            }
            this.loadPage()
        }
        return this
    }
});
Ccc.Company_Airline = function() {};
Ccc.Company_Airline.prototype = jQuery.extend(new Core.Grid, {
    _validateKeysOriginal: {
        common: "--",
        company_name: "--",
        title: "--",
        phone_number: "--",
        login_url: "--",
        logo: "--",
        address: "--",
        city: "--",
        country: "--",
        state: "--",
        zip_code: "--"
    },
    _validateKeys: {
        common: "--",
        company_name: "--",
        title: "--",
        phone_number: "--",
        login_url: "--",
        logo: "--",
        address: "--",
        city: "--",
        country: "--",
        state: "--",
        zip_code: "--"
    },
    submitForm: function() {
        current = this;
        jQuery(this.getForm()).ajaxForm({
            dataType: "json",
            success: function(e) {
                if (e.responseType == current._successText) {
                    current.setSuccessMessage(e.message);
                    current.alertMessage();
                    current.setURL(e.redirectURL).setUseType("url").loadPage()
                } else if (e.responseType == current._failureText) {
                    validation = new Core.Validation;
                    validation.printError(current._validateKeys, current._validateKeysOriginal, e.message)
                }
            },
            error: function() {},
            complete: function() {}
        }).submit()
    },
    selectCheckbox: function(e) {
        if (!jQuery("#creditcard_id_" + e).is(":checked")) {
            jQuery("#creditcard_id_" + e).attr("checked", true)
        } else {
            jQuery("#creditcard_id_" + e).removeAttr("checked")
        }
    },
    changeSetting: function(e) {
        window.location = e
    },
    confirmAirlineDelete: function(e) {
        if (confirm(e)) {
            if (!this.getURL()) {
                return this
            }
            this.loadPage()
        }
        return this
    }
});
Ccc.Creditcard_Type = function() {};
Ccc.Creditcard_Type.prototype = jQuery.extend(new Core.Grid, {});
Ccc.Customer_Bank_Account = function() {};
Ccc.Customer_Bank_Account.prototype = jQuery.extend(new Core.Grid, {});
Ccc.Customer_Airline_Account = function() {};
Ccc.Customer_Airline_Account.prototype = jQuery.extend(new Core.Grid, {
    _message: null,
    _id: null,
    setMessage: function(e) {
        this._message = e;
        return this
    },
    getMessage: function() {
        return this._message
    },
    setId: function(e) {
        if (!e) {
            alert("dialog name should not be empty.")
        }
        this._id = e;
        return this
    },
    getId: function() {
        return this._id
    },
    alertPopup: function() {
        var e = this;
        var t = jQuery("<div />").appendTo("body");
        t.attr("id", e._id);
        var n = new Core.Popup;
        n.setContentDialog(e._id);
        var r = n.getContentDialog();
        var i = {
            close: function() {
                if (jQuery(r)) {
                    jQuery(r).remove()
                }
            }
        };
        jQuery(r).dialog(i, {
            autoOpen: false,
            width: 500,
            title: "Message",
            resizable: false,
            modal: true,
            buttons: [{
                text: "Ok",
                click: function() {
                    jQuery(this).dialog("close");
                    return true
                }
            }]
        });
        jQuery(r).html(e._message);
        jQuery(r).dialog("open")
    },
    confirmPopup: function() {
        var e = this;
        var t = jQuery("<div />").appendTo("body");
        t.attr("id", e._id);
        var n = new Core.Popup;
        n.setContentDialog(e._id);
        var r = n.getContentDialog();
        var i = {
            close: function() {
                if (jQuery(r)) {
                    jQuery(r).remove()
                }
            }
        };
        jQuery(r).dialog(i, {
            autoOpen: false,
            width: 500,
            title: "Confirm",
            resizable: false,
            modal: true,
            buttons: [{
                text: "Ok",
                click: function() {
                    e.loadPage();
                    jQuery(this).dialog("close");
                    return true
                }
            }, {
                text: "Cancel",
                click: function() {
                    jQuery(this).dialog("close");
                    return false
                }
            }]
        });
        jQuery(r).html(e._message);
        jQuery(r).dialog("open")
    },
    closePopup: function() {
        var e = new Core.Popup;
        e.setContentDialog(this._id);
        var t = e.getContentDialog();
        jQuery(t).dialog("close")
    }
});
Ccc.Customer_Request = function() {};
Ccc.Customer_Request.prototype = jQuery.extend(new Core.Grid, {
    _content_dialog: "popup-container",
    _dialogTitle: "Dialog",
    _processForm: null,
    _processSaveUrl: null,
    _validateKeysOriginal: {
        common: "--",
        company_id: "--",
        status: "--",
        amount: "--"
    },
    _validateKeys: {
        common: "--",
        company_id: "--",
        status: "--",
        amount: "--"
    },
    setContentDialog: function(e) {
        if (!e) {
            alert("dialog name should not be empty.")
        }
        this._content_dialog = e;
        return this
    },
    setTitle: function(e) {
        if (!e) {
            alert("title should not be empty.")
        }
        this._dialogTitle = e;
        return this
    },
    setProcessForm: function(e) {
        if (!e) {
            alert("form elementId should not be empty.");
            return false
        }
        this._processForm = e;
        return this
    },
    getProcessForm: function() {
        if (!this._processForm) {
            alert("Unable to load form object.")
        }
        return this._processForm
    },
    openPopup: function() {
        var e = this;
        var t = jQuery("<div />").appendTo("body");
        t.attr("id", e._content_dialog);
        t.attr("title", e._dialogTitle);
        e.loadPage();
        var n = new Core.Popup;
        n.setContentDialog(e._content_dialog);
        var r = n.getContentDialog();
        var i = {
            close: function() {
                if (jQuery(r)) {
                    jQuery(r).remove();
                    MESSAGE.setElementId("message")
                }
            }
        };
        jQuery(r).dialog(i, {
            autoOpen: false,
            height: 450,
            width: 800,
            resizable: false,
            modal: true
        });
        jQuery(r).dialog("open")
    },
    closePopup: function() {
        var e = new Core.Popup;
        e.setContentDialog(this._content_dialog);
        var t = e.getContentDialog();
        jQuery(t).dialog("close")
    },
    processNext: function() {
        var e = this;
        var t = new Core.Loader;
        t.show();
        jQuery.ajax({
            type: this.getForm().attr("method"),
            url: this.getForm().attr("action"),
            data: this.getForm().serialize(),
            dataType: "json",
            success: function(t) {
                if (t.responseType == e._successText) {
                    if (typeof t.redirectURL != "undefined") {
                        if (t.redirectType == e.redirect.location) {
                            window.location = t.redirectURL
                        } else {
                            e.setURL(t.redirectURL).setUseType("url").loadPage()
                        }
                    } else {
                        e.manageHtml(t)
                    }
                } else if (t.responseType == e._failureText) {
                    MESSAGE.setMessage(t.message);
                    MESSAGE.setMessageType("error");
                    MESSAGE.setElementId("error-message");
                    MESSAGE.show()
                }
            },
            complete: function() {
                t.hide()
            }
        })
    },
    processSave: function() {
        this.setForm(this.getProcessForm());
        var e = new Core.Loader;
        var t = this;
        jQuery.ajax({
            type: "POST",
            url: this.getForm().attr("action"),
            data: this.getForm().serialize(),
            dataType: "json",
            success: function(n) {
                if (n.responseType == t._successText) {
                    t.closePopup();
                    t.setSuccessMessage(n.message);
                    t.setURL(n.redirectURL).setUseType("url").loadPage()
                } else if (n.responseType == t._failureText) {
                    e.hide();
                    validation = new Core.Validation;
                    validation.printError(t._validateKeys, t._validateKeysOriginal, n.message)
                }
            }
        })
    }
});
Ccc.Customer_Transfer_History = function() {};
Ccc.Customer_Transfer_History.prototype = jQuery.extend(new Core.Grid, {
    changeTransaction: function(e) {
        this.setElement("container").setURL(e).setUseType("url").loadPage()
    }
});
Ccc.Customer_Bank_Transaction = function() {};
Ccc.Customer_Bank_Transaction.prototype = jQuery.extend(new Core.Grid, {
    changeTransaction: function(e) {
        this.setElement("container").setURL(e).setUseType("url").loadPage()
    }
});
Ccc.Sql = function() {};
Ccc.Sql.prototype = jQuery.extend(new Core.Grid, {
    upgradeDatabase: function(e) {
        if (confirm(e)) {
            var t = new Core.Loader;
            t.show();
            var n = this;
            jQuery.ajax({
                type: this.getForm().attr("method"),
                url: this.getFormURL(),
                data: [],
                dataType: "json",
                success: function(e) {
                    if (e.responseType == n._successText) {
                        t.hide();
                        n.setSuccessMessage(e.message);
                        n.alertMessage();
                        n.setFormURL(e.redirectURL);
                        n.loadPage()
                    } else if (e.responseType == n._failureText) {
                        t.hide();
                        n.setErrorMessage(e.message);
                        n.alertMessage()
                    }
                }
            })
        }
    }
});
Ccc.Sql_Export = function() {};
Ccc.Sql_Export.prototype = jQuery.extend(new Core.Grid, {
    exportDatabase: function() {
        var e = "POST";
        this.getForm().submit()
    }
});
Core.Validation = function() {};
Core.Validation.prototype = jQuery.extend(new Core.Methods, {
    printError: function(e, t, n, r) {
        jQuery.extend(true, e, t);
        jQuery.extend(true, e, n);
        var i = null;
        s = false;
        if (r) {
            var s = jQuery("#" + r);
            if (s.length != 1) {
                s = false
            }
        }
        jQuery.each(e, function(e, t) {
            if (s) {
                i = jQuery("#" + e + "-validate", s)
            } else {
                i = jQuery("#" + e + "-validate")
            }
            if (i.length == 1) {
                if (t != "--" && t) {
                    i.html(t).fadeIn(200)
                } else {
                    i.html(t).hide()
                }
            }
            if (e == "common") {
                setTimeout(function() {
                    jQuery("#" + e + "-validate").hide()
                }, 15e3)
            }
        })
    }
});
Ccc.Customer_Bank_Payment = function() {};
Ccc.Customer_Bank_Payment.prototype = jQuery.extend(new Core.Grid, {});
Ccc.Database_Difference = function() {};
Ccc.Database_Difference.prototype = jQuery.extend(new Core.Methods, {
    sendRequest: function() {
        var e = this;
        var t = new Core.Loader;
        t.show();
        jQuery.ajax({
            type: this.getForm().attr("method"),
            url: this.getForm().attr("action"),
            data: this.getForm().serialize(),
            dataType: "json",
            success: function(n) {
                if (n.responseType == "failure") {
                    t.hide();
                    e.setErrorMessage(n.message);
                    e.alertMessage()
                } else if (n.responseType == "success") {
                    t.hide();
                    jQuery("#response_content").html(n.content)
                }
            }
        })
    },
    makeCopy: function() {
        var e = jQuery("#db1_host").val();
        var t = jQuery("#db1_user").val();
        var n = jQuery("#db1_password").val();
        var r = jQuery("#db1_database").val();
        jQuery("#db2_host").val(e);
        jQuery("#db2_user").val(t);
        jQuery("#db2_password").val(n);
        jQuery("#db2_database").val(r)
    },
    clear: function() {
        jQuery("#db1_host").val("");
        jQuery("#db1_user").val("");
        jQuery("#db1_password").val("");
        jQuery("#db1_database").val("");
        jQuery("#db2_host").val("");
        jQuery("#db2_user").val("");
        jQuery("#db2_password").val("");
        jQuery("#db2_database").val("")
    }
});
Ccc.Cron = function() {};
Ccc.Cron.prototype = jQuery.extend(new Core.Grid, {});
Ccc.Cron_Schedule = function() {};
Ccc.Cron_Schedule.prototype = jQuery.extend(new Core.Grid, {})