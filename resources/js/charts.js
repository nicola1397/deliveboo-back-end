import axios from "axios";
import Chart from "chart.js/auto";

window.Chart = Chart;

document.getElementById("yearSelect").addEventListener("change", function () {
    const selectedYear = this.value;
    updateChart(selectedYear);
});

// funzione di scelta per anno
function updateChart(year) {
    const dataForYear = [];
    if (year === "2023") {
        dataForYear = [12, 19, 3, 5, 2, 3, 7, 8, 12, 15, 20, 24];
    } else if (year === "2024") {
        dataForYear = getYears();
    }

    // Aggiorna il grafico con i nuovi dati
    myChart.data.datasets[0].data = dataForYear;
    myChart.update();
}

// inizializzo il grafico legandolo al myChart
const ctx = document.getElementById("myChart").getContext("2d");

function getNumberofOrders() {
    console.log("FUNONZA");
    document.addEventListener("DOMContentLoaded", (event) => {
        const orders = window.orders;
    });
    console.log(orders);
    const months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    // MAX AND MIN YEAR
    for (let i = 0; i < orders.length; i++) {
        let month = orders[i].date_time.substring(5, 7);
        month = month.replace(/^0+/, "");
        months[month - 1]++;
    }
    return months;
}

function getYears() {
    console.log("FUNONZA");
    document.addEventListener("DOMContentLoaded", (event) => {
        const orders = window.orders;
    });
    console.log(orders);
    let min = orders[0].date_time.substring(0, 4);
    let max = 0;
    // MAX AND MIN YEAR
    for (let i = 0; i < orders.length; i++) {
        let year = orders[i].date_time.substring(0, 4);
        if (year < min) {
            min = year;
        } else if (year > max) {
            max = year;
        }
    }
    console.log("massimo:" + max, "minimo: " + min);
}

const myChart = new Chart(ctx, {
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
                data: getNumberofOrders(),
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
// ,

// inizializzo il grafico legandolo al myChart
