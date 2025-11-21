var tableRoles;
document.addEventListener('DOMContentLoaded', function () {
    tableRoles = $('#tableRoles').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/Roles/getRoles",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idRol" },
            { "data": "nameRol" },
            { "data": "descripRol" },
            { "data": "statusRol" },
            { "data": "options" }
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    });

    var formRol = document.querySelector("#formRol");
    formRol.onsubmit = function (e) {
        e.preventDefault();
        var intidRol = document.querySelector('#idRol').value;
        var strName = document.querySelector('#txtName').value;
        var strDescription = document.querySelector('#txtDescription').value;
        var intStatus = document.querySelector('#listStatus').value;
        if (strName == '' || strDescription == '' || intStatus == '') {
            swal("Atención", "Todos los campos son obligatorios.", "error");
            return false;
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Roles/setRol';
        var formData = new FormData(formRol);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    swal("Roles de Usuario", objData.msg, "success");
                    tableRoles.ajax.reload(function () {
                        fntEditRol();
                        fntDelRol();
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            }
        };
    }
});

$('#tableRoles').DataTable();

function openModal() {
    document.querySelector('#idRol').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector('#formRol').reset();
    $('#modalFormRol').modal('show');
}

window.addEventListener('load', function () {
    fntEditRol();
    //fntDelRol();
}, false);

function fntEditRol() {
    var btnEditRol = document.querySelectorAll(".btnEditRol");
    btnEditRol.forEach(function (btnEditRol) {
        btnEditRol.addEventListener('click', function () {
            document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
            document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";

            var idRol = this.getAttribute("rl");
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Roles/getRol/' + idRol;
            request.open("GET", ajaxUrl, true);
            request.send();
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var objData = JSON.parse(request.responseText);
                    if (objData.status) {
                        document.querySelector('#idRol').value = objData.data.idRol;
                        document.querySelector('#txtName').value = objData.data.nameRol;
                        document.querySelector('#txtDescription').value = objData.data.descripRol;
                        if (objData.data.statusRol == 1) {
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        } else {
                            var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                        }
                        var htmlSelect = `$optionSelect;
                                        <option value="1">Activo</option>;
                                        <option value="2">Inactivo</option>`;
                        document.querySelector('#listStatus').innerHTML = htmlSelect;

                    } else {
                        swal("Error", objData.msg, "error");
                    }
                }
            };
        });
    });
}

function fntDelRol() {
    var btnDelRol = document.querySelectorAll(".btnDelRol");
    btnDelRol.forEach(function (btnDelRol) {
        btnDelRol.addEventListener('click', function () {
            var idRol = this.getAttribute("rl");
            swal({
                title: "Eliminar Rol",
                text: "¿Realmente quiere eliminar el Rol?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar!",
                cancelButtonText: "No, cancelar!",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = base_url + '/Roles/delRol/'; + idRol;
                    request.open("POST", ajaxUrl, true);
                    request.send();
                    request.onreadystatechange = function () {
                        if (request.readyState == 4 && request.status == 200) {
                            var objData = JSON.parse(request.responseText);
                            if (objData.status) {
                                swal("Eliminar!", objData.msg, "success");
                                tableRoles.ajax.reload(function () {
                                    fntEditRol();
                                    fntDelRol();
                                });
                            } else {
                                swal("Atención!", objData.msg, "error");
                            }
                        }
                    };
                }
            });
        });
    });
}