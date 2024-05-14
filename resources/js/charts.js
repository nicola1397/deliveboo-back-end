import axios from "axios";
import Chart from "chart.js/auto";

window.Chart = Chart;

const monthLabels = [
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
// inizializzo il grafico legandolo al myChart
function getCurrentDateTime() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, "0"); // Months are zero-indexed
    const day = String(now.getDate()).padStart(2, "0");
    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");
    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}
function ordersPerMonth() {
    console.log("ordersPerMonth");

    const ordersPerMonth = new Array(12).fill(0);
    console.log(ordersPerMonth);
    const currentDate = new Date();
    console.log(currentDate);

    let orders = window.orders;

    console.log(orders);

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

function revenuePerMonth() {
    const revenuePerMonth = new Array(12).fill(0);
    const currentDate = new Date();

    orders.forEach((order) => {
        const orderDate = new Date(order.date_time);
        const monthDifference =
            (currentDate.getFullYear() - orderDate.getFullYear()) * 12 +
            currentDate.getMonth() -
            orderDate.getMonth();

        if (monthDifference >= 0 && monthDifference < 12) {
            revenuePerMonth[monthDifference] += Number(order.price);
        }
    });
    const formattedRevenue = revenuePerMonth.map((amount) =>
        parseFloat(amount.toFixed(2))
    );
    console.log(formattedRevenue);

    return formattedRevenue.reverse();
}

function generateMonthLabels() {
    const monthLabels = [];
    const currentDate = new Date();
    for (let i = 11; i >= 0; i--) {
        const month = new Date(
            currentDate.getFullYear(),
            currentDate.getMonth() - i,
            1
        );
        monthLabels.push(
            month.toLocaleString("it-IT", { month: "long", year: "numeric" })
        );
    }
    return monthLabels; // This will order the labels from the current month to 11 months ago
}

const ordersData = {
    labels: generateMonthLabels(),
    datasets: [
        {
            label: "Ordini per mese",
            data: ordersPerMonth(),
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
                "rgba(76, 175, 80, 0.2)",
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
};

const revenueData = {
    labels: generateMonthLabels(),
    datasets: [
        {
            label: "Guadagni per mese",
            data: revenuePerMonth(),
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
                "rgba(76, 175, 80, 0.2)",
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
};
document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("toggleData");

    const ctx = document.getElementById("ordersChart").getContext("2d");

    let currentDataset = ordersData;

    const ordersChart = new Chart(ctx, {
        type: "bar",
        data: currentDataset,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                    },
                },
            },
        },
    });

    function toggleDataset() {
        currentDataset =
            currentDataset === ordersData ? revenueData : ordersData;
        ordersChart.data = currentDataset;
        if (this.textContent === "Ordini") {
            this.textContent = "Guadagno";
            this.classList.remove("orders");
            this.classList.add("revenue");
        } else {
            this.textContent = "Ordini";
            this.classList.remove("revenue");
            this.classList.add("orders");
        }
        ordersChart.update();
    }
    button.addEventListener("click", toggleDataset);
});
