import axios from "axios";
import Chart from "chart.js/auto";

window.Chart = Chart;

document.getElementById("yearSelect").addEventListener("change", function () {
    const selectedYear = this.value;
    updateChart(selectedYear);
});
window.onload = updateChart();
// funzione di scelta per anno
function updateChart() {
    dataForYear = getYears();

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
    type: "bar",
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
                label: "Ultimo anno",

                data: OrdersPerMonth(orders),

                backgroundColor: [
                    "rgba(0, 105, 92, 0.2)",
                    "rgba(33, 150, 243, 0.2)",
                    "rgba(255, 235, 59, 0.2)",
                    "rgba(76, 175, 80, 0.2)",
                    "rgba(255, 87, 34, 0.2)",
                    "rgba(121, 85, 72, 0.2)",
                    "rgba(96, 125, 139, 0.2)",
                    "rgba(158, 158, 158, 0.2)",
                    "rgba(233, 30, 99, 0.2)",
                    "rgba(103, 58, 183, 0.2)",
                    "rgba(255, 193, 7, 0.2)",
                    "rgba(3, 169, 244, 0.2)",
                ],
                borderColor: [
                    "rgb(0, 105, 92)",
                    "rgb(33, 150, 243)",
                    "rgb(255, 235, 59)",
                    "rgb(255, 87, 34)",
                    "rgb(121, 85, 72)",
                    "rgb(96, 125, 139)",
                    "rgb(158, 158, 158)",
                    "rgb(233, 30, 99)",
                    "rgb(103, 58, 183)",
                    "rgb(255, 193, 7)",
                    "rgb(3, 169, 244)",
                ],
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
const months = [
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
];

function OrdersPerMonth(orders) {
    const ordersPerMonth = new Array(12).fill(0);
    const currentDate = new Date();

    orders.forEach((order) => {
        const orderDate = new Date(order.date_time);
        const monthDifference =
            (currentDate.getFullYear() - orderDate.getFullYear()) * 12 +
            currentDate.getMonth() -
            orderDate.getMonth();

        if (monthDifference >= 0 && monthDifference < 12) {
            ordersPerMonth[monthDifference]++;
        }
    });

    return ordersPerMonth.reverse();
}
