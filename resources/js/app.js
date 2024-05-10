import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import Chart from "chart.js/auto";
import.meta.glob(["../img/**"]);

window.Chart = Chart;

var ctx = document.getElementById("myChart").getContext("2d");

var myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [
            "Gennaio",
            "Febbraio",
            "Marzo",
            "Aprile",
            "Maggio",
            "Giugno",
            "Luglio",
            "Agosto",
            "Settembre",
            "Ottobre",
            "Novembre",
            "Dicembre",
        ],
        datasets: [
            {
                label: "Vendite per Mese",
                data: [12, 19, 3, 5, 2, 3, 7, 8, 12, 15, 20, 24],
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                borderColor: "rgba(255, 99, 132, 1)",
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
