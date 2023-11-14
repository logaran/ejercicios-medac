

class ModeloPersistencia {
    constructor() {
        // Intentamos cargar la base de datos, si no existe lo inicializamos a un array vacio
        // Asi será, ahora mismo leemos el JSON que hemos creado para pruebas
        /* 
        this.persitencia = JSON.parse(localStorage.getItem('persistencia')) || {
            citas: [],
            pacientes: []
        }; */
        
        // Leemos el JSON
        fetch('./persistencia.json')
        .then(response => response.json())
        .then(datos => {
            this.persitencia = datos;
            console.log(datos.citas);
            console.log(datos.pacientes);
        })
        .catch(error => console.error('Error al cargar el JSON:', error));
    }
    
    guardarPersistencia() {
        // Guardamos la base de datos en localStorage
        localStorage.setItem('persistencia', JSON.stringify(this.persitencia));
    }
}

class ModeloCitas extends ModeloPersistencia {
    
    guardarCita(cita) {
        // Agregamos citas al array de citas
        this.persitencia.citas.push(cita);
        // Guardar Base de datos
        this.guardarPersistencia();
    }
    
    eliminarCita(cita){};
}



class Cita {
    constructor(fecha, idPaciente) {
        this.fecha = fecha;
        this.paciente = idPaciente;
    }
}


class Paciente {
    constructor(nombre, apellidos, fechaNacimiento, tlf, email, observaciones = "") {
        this.nombre = nombre;
        this.apellidos = apellidos;
        this.fechaNacimiento = fechaNacimiento;
        this.tlf = tlf;
        this.email = email;
        this.observaciones = observaciones;
    }
}

const dataBase = new ModeloPersistencia();

(function listarCitas() {
    const tabla = document.getElementById('cuerpoTabla');
    dataBase.citas.forEach(element => {
        const row = document.createElement('tr');
        row.classList('row col-12 m-auto');
        row.innerHTML(`
            <td class="col-3">13/11/2023 14:15pm</td>
            <td class="col-4">Freddy Hardest</td>
            <td class="col-3">555-432256</td>
            <td class="col-1">/</td>
            <td class="col-1">X</td>
        `)
        console.log(element);
        tabla.appendChild(row);
    });
})();