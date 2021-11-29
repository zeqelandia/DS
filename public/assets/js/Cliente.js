class Cliente{
    constructor(data){
        this.data = {
            "dni": data.dni,
            "nombre": data.nombre,
            "apellido": data.apellido,
            "telefono": data.telefono,
            "localidad": data.localidad,
            "direccion": data.direccion,
            "mail": data.mail
        }
    }

    getComponent = function() {
        return `
            <td>${this.data.nombre}</td>
            <td>${this.data.apellido}</td>
            <td>${this.data.dni}</td>
            <td>${this.data.telefono}</td>
            <td>${this.data.localidad}</td>
            <td>${this.data.direccion}</td>
            <td>${this.data.mail}</td>
        `;
    }

    getElement = function() {
        const res = document.createElement("tr");
        res.classList.add(["t-row"]);
        res.classList.add(["task"]);
        res.classList.add(["task-cliente"]);
        res.innerHTML = this.getComponent();

        return res
    }
}