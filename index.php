<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGIÓN POLICIAL CUSCO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>


        button.btn.btn-success {
            font-size: 32.5px; /* Aumenta el tamaño de la fuente */
            padding: 15px 40px; /* Ajusta el tamaño del botón (arriba y abajo, izquierda y derecha) */
            border-radius: 16px; /* Bordes redondeados */
            width: 250px; /* Puedes ajustar el ancho del botón según lo desees */
        }

        /* Sidebar más ancho */
        /* Modificar el contenedor de los ganadores para tener un scroll vertical */
        #ganadores-lista {
            width: 120%; /* Hace que el contenedor ocupe todo el ancho disponible */
            max-width: 100%; /* Evita que el cuadro se haga más grande de lo necesario */
            background-color: white; /* Fondo blanco para el cuadro */
            padding: 5px; /* Espaciado interno */
            border-radius: 8px; /* Bordes redondeados */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Sombra para darle más relieve */
            word-wrap: break-word; /* Permite que el texto largo se ajuste dentro del contenedor */
            display: block;
            overflow-wrap: break-word;
            max-height: 900px; /* Límite de altura */
            overflow-y: auto; /* Agrega scroll vertical */
            list-style-type: decimal !important; /* Esto cambia el punto por números */
        }

        #ganadores-lista li {
            margin-bottom: 10px; /* Espaciado entre los elementos */
            padding: 10px; /* Espaciado interno para cada elemento */
            border: 1px solid #ccc; /* Borde suave para los elementos */
            border-radius: 4px; /* Bordes redondeados */
            background-color: #f9f9f9; /* Fondo suave para los elementos */
            max-width: 120%; /* Permite que el elemento de la lista ocupe el 100% del contenedor */
        }

        .container {
            width: 80%;  /* Ajusta el contenedor para que sea más grande */
            max-width: 1200px;  /* Limita el ancho máximo del contenedor */
            margin: auto;
            overflow: hidden;
        }

        .main-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Animación de movimiento para el texto */
        @keyframes movimiento {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(15px); /* Mueve a la derecha */
            }
            100% {
                transform: translateX(0); /* Regresa a la posición inicial */
            }
        }

        .main-sidebar {
            width: 350px !important; /* Ancho del sidebar */
            background-color: #18341c !important; /* Color amarillo */
        }

        .main-sidebar .nav-link.active {
            background-color: #504454 !important; /* Color para el enlace activo */
            width: 330px;
        }

        .main-sidebar .nav-link {
            color: #FFFFFF !important; /* Color del texto de los enlaces */
            font-weight: bold; /* Hace el texto en negrita */
        }

        .nav-item .btn-secondary {
            background-color: #504454  !important; /* Color del botón Importar */
            color: white !important;
            font-weight: bold; /* Hace el texto de los botones en negrita */
        }

        .nav-item .btn-primary {
            background-color: #504454  !important; /* Color del botón Exportar */
            color: white !important;
            font-weight: bold; /* Hace el texto de los botones en negrita */
        }

        .content-wrapper {
            margin-left: 350px; /* Espacio para el sidebar ampliado */
            background-color: #fcec04 !important; /* Color de fondo (amarillo claro) */
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            height: 100vh;
        }

        .ruleta-container {
            position: relative;
            width: 300px;
            height: 300px;
        }

        .ruleta {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 10px solid #333;
            position: relative;
            overflow: hidden;
            background-color: #377e22; /* Color de fondo verde para toda la ruleta */
            transition: transform 2s ease-out;
        }

        .flecha {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 20px solid black;
        }

        .card {
            width: 140%;  /* Aumenta el ancho de la tarjeta */
            max-width: 700px;  /* Ajusta el tamaño máximo */
            padding: 20px;  /* Espaciado interno más amplio */
        }

        .pica-pica {
            font-size: 24px;
            color: black;
            display: block;
            text-align: center;
        }

        /* Imagen centrada con movimiento */
        .sidebar img {
            display: block;
            margin: 50px auto;
            max-width: 74%; /* Ajusta el tamaño */
            height: auto;
            animation: movimiento 3s ease-in-out infinite; /* Efecto de movimiento */
        }

        @keyframes movimiento {
            0% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(15px); /* Movimiento ligero hacia la derecha */
            }
            100% {
                transform: translateX(0); /* Regresa a su posición inicial */
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-gem"></i>
                            <p>REGIÓN POLICIAL CUSCO</p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="#" class="nav-link" onclick="seleccionarMina(1, 'HUDBAY')">HUDBAY</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" onclick="seleccionarMina(2, 'ANTAPACCAY')">ANTAPACCAY</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" onclick="seleccionarMina(3, 'LAS BAMBAS')">LAS BAMBAS</a></li>
                            <li class="nav-item"><a href="#" class="nav-link" onclick="seleccionarMina(4, 'QUECHUA')">QUECHUA</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <label class="btn btn-secondary btn-block">
                            <input type="file" id="fileInput" accept=".xlsx" style="display: none;">
                            <i class="fas fa-file-import"></i> Importar Participantes
                        </label>
                    </li>
                    <li class="nav-item mt-2">
                        <button class="btn btn-primary btn-block" onclick="exportarPDF()">
                            <i class="fas fa-download"></i> Exportar Ganadores
                        </button>
                    </li>
                </ul>
            </nav>
            <img src="http://localhost/www.sorteospnp.com/www.sorteospnp.com/public/images/POLI.png" alt="Imagen de ejemplo">
            <img src="http://localhost/www.sorteospnp.com/www.sorteospnp.com/public/images/PNP.png" alt="Escudo" style="width: 120%; height: auto; display: block; margin: 0 auto;">
        </div>
    </aside>

    <!-- Contenido Principal -->
    <div class="content-wrapper">
        <div class="container text-center">
            <h1 style="font-size: 27px; font-weight: bold; color: #18341c; text-align: center; margin-top: 17px;">Gire la ruleta aleatoria</h1>
            <h1 style="font-size: 18px; color:rgb(0, 0, 0); position: absolute; top: 96%; width: 47%; text-align: center;">Tu bienestar es nuestra prioridad - Región Policial Cusco</h1>
            <h2 style="font-size: 40px; font-weight: bold; color: #333; position: absolute; top: 60%; left: 39%; transform: translate(-50%, -450%);">
                <span>REGIÓN POLICIAL CUSCO</span>
                <img src="http://localhost/www.sorteospnp.com/www.sorteospnp.com/public/images/CUDO.PNG" alt="Logo" style="width: 120px; height: auto;">
            </h2>
            <div class="ruleta-container mx-auto my-4">
                <div class="flecha"></div>
                <div class="ruleta" id="ruleta"></div>
            </div>
            <button class="btn btn-success" onclick="girarRuleta()">Girar Ruleta</button>
        </div>

        <!-- Panel de Ganadores -->
        <div class="card p-3">
            <h3 id="titulo-resultados">RESULTADOS DE GANADORES DEL SORTEO</h3>

            <ol id="ganadores-lista"></ol>
        </div>
    </div>
    <div class="linea-azul"></div>
</div>

<script>
    let participantes = [];
    let ganadores = [];
    let minaSeleccionada = 1;
    let nombreMina = '';
    let imagenGanador = "http://localhost/www.sorteospnp.com/www.sorteospnp.com/public/images/PNP.PNG";
    let coloresMina = {
        'HUDBAY': '',
        'ANTAPACCAY': '',
        'LAS BAMBAS': '',
        'QUECHUA': ''
    };

    function seleccionarMina(mina, nombre) {
    if (participantes.length === 0) {
        Swal.fire({
            title: '¡Error!',
            text: 'Por favor, importa los participantes primero.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
        return;
    }

    minaSeleccionada = mina;
    nombreMina = nombre;
    ganadores = [];
    actualizarGanadores();

    // Actualiza el título de los resultados con la mina seleccionada
    document.getElementById('titulo-resultados').innerText = `RESULTADOS DE GANADORES DEL SORTEO - MINA: ${nombreMina}`;

    Swal.fire({
        title: `Se sorteará con la mina ${nombreMina}`,
        icon: 'info',
        confirmButtonText: 'Aceptar'
    });
}


    document.getElementById("fileInput").addEventListener("change", cargarParticipantes);

    function cargarParticipantes() {
        let file = document.getElementById('fileInput').files[0];
        if (!file) {
            alert("Por favor, selecciona un archivo.");
            return;
        }

        let reader = new FileReader();
        reader.onload = function(e) {
            try {
                let data = new Uint8Array(e.target.result);
                let workbook = XLSX.read(data, { type: 'array' });
                let sheetName = workbook.SheetNames[0];
                let sheet = workbook.Sheets[sheetName];
                let dataJSON = XLSX.utils.sheet_to_json(sheet);

                if (dataJSON.length === 0) {
                    alert("El archivo Excel está vacío.");
                    return;
                }

                const requiredColumns = ["GRADO", "APELLIDO PATERNO", "APELLIDO MATERNO", "NOMBRES", "CIP", "DNI", "UNIDAD"];
                let missingColumns = requiredColumns.filter(column => !dataJSON[0].hasOwnProperty(column));

                if (missingColumns.length > 0) {
                    alert("El archivo Excel está incompleto. Faltan las siguientes columnas: " + missingColumns.join(", "));
                    return;
                }

                participantes = dataJSON.map(row => ({
                    grado: row["GRADO"],
                    apellidoPaterno: row["APELLIDO PATERNO"],
                    apellidoMaterno: row["APELLIDO MATERNO"],
                    nombres: row["NOMBRES"],
                    cip: row["CIP"],
                    dni: row["DNI"],
                    unidad: row["UNIDAD"]
                }));

                generarRuleta();
                Swal.fire({
                    title: '¡Participantes Importados!',
                    text: `Se han importado un total de ${participantes.length} participantes.`,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            } catch (error) {
                alert("Hubo un error al leer el archivo Excel. Por favor, asegúrate de que esté en formato .xlsx.");
                console.error(error);
            }
        };
        reader.readAsArrayBuffer(file);
    }

    function generarRuleta() {
        let ruleta = document.getElementById("ruleta");
        if (participantes.length === 0) {
            alert("No se han encontrado participantes. Verifica el archivo cargado.");
            return;
        }

        ruleta.innerHTML = "";
        let numParticipantes = participantes.length;
        let angulo = 360 / numParticipantes;

        participantes.forEach((participante, index) => {
            let segmento = document.createElement("div");
            segmento.classList.add("opcion");
            segmento.style.position = "absolute";
            segmento.style.width = "50%";
            segmento.style.height = "50%";
            segmento.style.backgroundColor = coloresMina[nombreMina];
            segmento.style.clipPath = "polygon(100% 50%, 0 0, 0 100%)";
            segmento.style.transformOrigin = "100% 50%";
            segmento.style.transform = `rotate(${index * angulo}deg)`;
            ruleta.appendChild(segmento);
        });

        let imagen = document.createElement("img");
        imagen.src = "http://localhost/www.sorteospnp.com/www.sorteospnp.com/public/images/POLI2.PNG";
        imagen.style.position = "absolute";
        imagen.style.top = "50%";
        imagen.style.left = "50%";
        imagen.style.transform = "translate(-50%, -50%)";
        imagen.style.width = "70%";
        ruleta.appendChild(imagen);
    }

    function girarRuleta() {
        if (!minaSeleccionada) {
            Swal.fire({
                title: '¡Error!',
                text: 'Por favor, selecciona una mina antes de girar la ruleta.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
            return;
        }

        if (participantes.length === 0) {
            Swal.fire({
                title: '¡Error!',
                text: 'Por favor, importa los participantes primero.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
            return;
        }

        let ganadorIndex = Math.floor(Math.random() * participantes.length);
        let ganador = participantes[ganadorIndex];

        ganadores.push({
            mina: nombreMina,
            grado: ganador.grado,
            apellidoPaterno: ganador.apellidoPaterno,
            apellidoMaterno: ganador.apellidoMaterno,
            nombres: ganador.nombres,
            cip: ganador.cip,
            dni: ganador.dni,
            unidad: ganador.unidad
        });

        participantes.splice(ganadorIndex, 1);

        let ruleta = document.getElementById("ruleta");
        ruleta.style.transition = "transform 2s ease-out";
        ruleta.style.transform = "rotate(" + (Math.floor(Math.random() * 1000) + 1800) + "deg)";

        setTimeout(function() {
            Swal.fire({
                title: '¡Ganador!',
                html: `
                    <b>Nombre:</b> ${ganador.nombres} ${ganador.apellidoPaterno} ${ganador.apellidoMaterno} <br>
                    <b>Grado:</b> ${ganador.grado} <br>
                    <b>CIP:</b> ${ganador.cip} <br>
                    <b>DNI:</b> ${ganador.dni} <br>
                    <b>Unidad:</b> ${ganador.unidad}
                `,
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });

            generarRuleta();
            actualizarGanadores();
        }, 2000);
    }

    function actualizarGanadores() {
        let lista = document.getElementById("ganadores-lista");
        lista.innerHTML = "";

        let numGanadores = 1;
        ganadores.forEach(g => {
            let item = document.createElement("li");
            item.innerHTML = `${numGanadores}. Mina ${g.mina} ${g.grado} ${g.nombres} ${g.apellidoPaterno} ${g.apellidoMaterno}, CIP: ${g.cip}, DNI: ${g.dni}, Unidad: ${g.unidad}`;
            lista.appendChild(item);
            numGanadores++;
        });

        lista.scrollTop = lista.scrollHeight;
    }

    function exportarPDF() {
        let { jsPDF } = window.jspdf;
        let doc = new jsPDF();

        doc.setFont("helvetica", "normal");
        doc.setFontSize(7.5);

        doc.text(`LISTA DE GANADORES DEL SORTEO - MINA: ${nombreMina}`, 10, 10);

        let yPosition = 20;
        let margin = 10;
        let maxWidth = 190;

        ganadores.forEach((g, index) => {
            let text = `${index + 1}. Mina ${g.mina}: ${g.grado} ${g.nombres} ${g.apellidoPaterno} ${g.apellidoMaterno}, CIP: ${g.cip}, DNI: ${g.dni}, Unidad: ${g.unidad}`;

            if (index % 2 === 0) {
                doc.setFillColor(220, 220, 220);
                doc.rect(margin - 1, yPosition - 3, maxWidth, 8, 'F');
            }

            doc.text(text, margin, yPosition, { maxWidth: maxWidth });
            yPosition += 8;

            if (yPosition > 270) {
                doc.addPage();
                yPosition = 20;
                doc.text("LISTA DE GANADORES DEL SORTEO", 10, 10);
            }
        });

        doc.save("Relación de ganadores.pdf");
    }
</script>

</body>
</html>
