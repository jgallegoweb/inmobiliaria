/*global XMLHttpRequest: false*/
/*global alert: false*/
function Ajax() {
    'use strict';
    this.peticion = new XMLHttpRequest();
    this.url = "";
    this.parametros = "";
    this.metodo = "GET";
    this.xml = false;
    this.respuesta = alert;
    this.error = alert;
}
Ajax.prototype.setUrl = function (url) {
    'use strict';
    this.url = url;
};
Ajax.prototype.setParametros = function (parametros) {
    'use strict';
    this.parametros = parametros;
};
Ajax.prototype.setPost = function () {
    'use strict';
    this.metodo = "POST";
};
Ajax.prototype.setGet = function () {
    'use strict';
    this.metodo = "GET";
};
Ajax.prototype.setXML = function () {
    'use strict';
    this.xml = true;
};
Ajax.prototype.setJSON = function () {
    'use strict';
    this.xml = false;
};
Ajax.prototype.setRespuesta = function (funcion) {
    'use strict';
    this.respuesta = funcion;
};
Ajax.prototype.setRespuestaError = function (funcion) {
    'use strict';
    this.error = funcion;
};
Ajax.prototype.procesar = function (funcion, dato) {
    'use strict';
    funcion(dato);
};
Ajax.prototype.doPeticion = function () {
    'use strict';
    var that = this;
    this.peticion.open(this.metodo, this.url, true);
    this.peticion.onreadystatechange = function () {
        if (that.peticion.readyState === 4) {
            if (that.peticion.status === 200) {
                var respuesta;
                if (that.xml) {
                    respuesta = that.peticion.responseXML;
                } else {
                    respuesta = that.peticion.responseText;
                }
                that.procesar(that.respuesta, respuesta);
            } else if (that.peticion.status === 404) {
                that.procesar(that.error, "error");
            } else {
                that.procesar(that.error, "error de conexión");
            }
        }
    };
    if (this.metodo === "POST") {
        this.peticion.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        this.peticion.send(this.parametros);
    } else {
        this.peticion.send();
    }
};

