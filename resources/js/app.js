import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import Chart from "chart.js/auto";
import { lte } from "lodash";
import.meta.glob(["../img/**"]);

window.Chart = Chart;


// abbiamo aggiunto un bottone di scelta 
document.getElementById('yearSelect').addEventListener('change', function () {
    const selectedYear = this.value;
    updateChart(selectedYear);
});

// funzione di scelta per anno
function updateChart(year) {

    const dataForYear = [];
    if (year === '2023') {
        dataForYear = [12, 19, 3, 5, 2, 3, 7, 8, 12, 15, 20, 24];
    } else if (year === '2024') {
        dataForYear = [25, 22, 18, 14, 10, 6, 9, 16, 19, 23, 28, 30];
    }

    // Aggiorna il grafico con i nuovi dati
    myChart.data.datasets[0].data = dataForYear;
    myChart.update();
}

// inizializzo il grafico legandolo al myChart
const ctx = document.getElementById("myChart").getContext("2d");

const myChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: [
            "Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno",
            "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"
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
