document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("salesChart").getContext("2d");
    const gradient = ctx.createLinearGradient(0, ctx.canvas.height, 0, 0);
    gradient.addColorStop(1, "#011b4e");
    gradient.addColorStop(0.5, "#138fdc");
    gradient.addColorStop(0, "#000000");

    let isDark = localStorage.getItem("theme") === "dark";

    function createDoughnutChart() {
        var userCtx = document.getElementById("userChart").getContext("2d");
        if (window.userChartInstance) {
            window.userChartInstance.destroy(); // Destruye el gráfico existente
        }
        window.userChartInstance = new Chart(userCtx, {
            type: "doughnut",
            data: {
                labels: ["New", "Returning", "Inactive"],
                datasets: [
                    {
                        data: [62, 26, 12],
                        backgroundColor: [
                            "#f2d410", // Amarillo para "New"
                            "#f6e36b", // Verde claro para "Returning"
                            "#eee7b9", // Rojo para "Inactive"
                        ],
                        borderWidth: 8,
                        borderColor: "rgba(0,0,0,0)", // Cambia el color del borde
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: "70%",
                plugins: {
                    legend: {
                        display: false, // Ocultar la leyenda
                    },
                    tooltip: {
                        enabled: false, // Deshabilitar tooltips
                    },
                },
            },
        });
    }

    function createDoughnutChartOrder() {
        var orderCtx = document.getElementById("orderChart").getContext("2d");
        if (window.orderChartInstance) {
            window.orderChartInstance.destroy(); // Destruye el gráfico existente
        }
        window.orderChartInstance = new Chart(orderCtx, {
            type: "doughnut",
            data: {
                labels: ["Completed", "Pending", "Canceled"],
                datasets: [
                    {
                        data: [50, 45, 5],
                        backgroundColor: [
                            "#138fdc", // Amarillo para "New"
                            "#38c172", // Verde claro para "Returning"
                            "#e3342f", // Rojo para "Inactive"
                        ],
                        borderWidth: 8,
                        borderColor: "rgba(0,0,0,0)", // Cambia el color del borde
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: "70%",
                plugins: {
                    legend: {
                        display: false, // Ocultar la leyenda
                    },
                    tooltip: {
                        enabled: false, // Deshabilitar tooltips
                    },
                },
            },
        });
    }

    // Crear el gráfico inicialmente
    createDoughnutChart();
    createDoughnutChartOrder();

    new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre",
            ],
            datasets: [
                {
                    label: "Ventas",
                    data: [
                        1200, 1500, 800, 1700, 2000, 2300, 1800, 2200, 1900,
                        2500, 2700, 3000,
                    ],
                    backgroundColor: gradient,
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 3,
                    tension: 0.2, // Suavizar la línea
                    fill: false,
                    pointRadius: 0, // Eliminar puntos en la línea
                    pointHoverRadius: 6, // Mostrar un punto más grande en hover
                    pointHoverBackgroundColor: "rgba(54, 162, 235, 1)", // Color del punto en hover
                    pointHoverBorderColor: "#ffffff", // Borde del punto en hover
                    pointHoverBorderWidth: 2, // Ancho del borde en hover
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false, // Ocultar la leyenda
                },
                tooltip: {
                    enabled: true, // Habilitar tooltips
                    backgroundColor: "rgba(0,0,0,0.8)", // Fondo oscuro o claro según el tema
                    titleFont: {
                        family: "Poppins", // Fuente personalizada
                        size: 16,
                        weight: "600",
                        color: "#ffffff",
                    },
                    bodyFont: {
                        family: "Poppins", // Fuente personalizada
                        size: 14,
                        color: "#ffffff",
                    },
                    padding: 12,
                    cornerRadius: 6,
                    borderColor: "rgba(255, 255, 255, 0.4)", // Color del borde
                    borderWidth: 1,
                    caretPadding: 10, // Espacio entre el tooltip y el punto
                    caretSize: 6, // Tamaño del caret (la flecha que apunta al punto)
                    displayColors: false, // Ocultar el color del punto en el tooltip
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label || "";
                            if (label) {
                                label += ": ";
                            }
                            if (context.parsed.y !== null) {
                                label +=
                                    "$" + context.parsed.y.toLocaleString(); // Formatear número como dinero
                            }
                            return label;
                        },
                        title: function (context) {
                            return context[0].label; // Mostrar el mes en el título del tooltip
                        },
                    },
                },
            },
            interaction: {
                intersect: false,
            },
            scales: {
                y: {
                    display: false, // Ocultar el eje Y
                },
                x: {
                    display: false, // Ocultar el eje X
                },
            },
            elements: {
                line: {
                    borderWidth: 2,
                },
                point: {
                    radius: 0, // Ocultar puntos por defecto
                },
            },
            hover: {
                mode: "nearest",
                intersect: false,
            },
        },
    });
    var viewsNewCtx = document.getElementById("viewsNew").getContext("2d");
    new Chart(viewsNewCtx, {
        type: "line",
        data: {
            labels: [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre",
            ],
            datasets: [
                {
                    label: "Ventas",
                    data: [
                        1200, 1500, 800, 1700, 2000, 2300, 1800, 2200, 1900,
                        2500, 2700, 3000,
                    ],
                    backgroundColor: gradient,
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 3,
                    tension: 0.2, // Suavizar la línea
                    fill: false,
                    pointRadius: 0, // Eliminar puntos en la línea
                    pointHoverRadius: 6, // Mostrar un punto más grande en hover
                    pointHoverBackgroundColor: "rgba(54, 162, 235, 1)", // Color del punto en hover
                    pointHoverBorderColor: "#ffffff", // Borde del punto en hover
                    pointHoverBorderWidth: 2, // Ancho del borde en hover
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false, // Ocultar la leyenda
                },
                tooltip: {
                    enabled: true, // Habilitar tooltips
                    backgroundColor: "rgba(0,0,0,0.8)", // Fondo oscuro o claro según el tema
                    titleFont: {
                        family: "Poppins", // Fuente personalizada
                        size: 16,
                        weight: "600",
                        color: "#ffffff",
                    },
                    bodyFont: {
                        family: "Poppins", // Fuente personalizada
                        size: 14,
                        color: "#ffffff",
                    },
                    padding: 12,
                    cornerRadius: 6,
                    borderColor: "rgba(255, 255, 255, 0.4)", // Color del borde
                    borderWidth: 1,
                    caretPadding: 10, // Espacio entre el tooltip y el punto
                    caretSize: 6, // Tamaño del caret (la flecha que apunta al punto)
                    displayColors: false, // Ocultar el color del punto en el tooltip
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label || "";
                            if (label) {
                                label += ": ";
                            }
                            if (context.parsed.y !== null) {
                                label +=
                                    "$" + context.parsed.y.toLocaleString(); // Formatear número como dinero
                            }
                            return label;
                        },
                        title: function (context) {
                            return context[0].label; // Mostrar el mes en el título del tooltip
                        },
                    },
                },
            },
            interaction: {
                intersect: false,
            },
            scales: {
                y: {
                    display: false, // Ocultar el eje Y
                },
                x: {
                    display: false, // Ocultar el eje X
                },
            },
            elements: {
                line: {
                    borderWidth: 2,
                },
                point: {
                    radius: 0, // Ocultar puntos por defecto
                },
            },
            hover: {
                mode: "nearest",
                intersect: false,
            },
        },
    });
});
