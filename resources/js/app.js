import './bootstrap';

import Chart from "chart.js/auto";

// Grafik Aktivitas Mingguan
const ctx = document.getElementById("aktivitasChart");
if (ctx) {
    new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
            datasets: [
                {
                    label: "Jam Kerja",
                    data: [8, 7, 6, 9, 5, 4, 0, 4], // data dummy
                    backgroundColor: [
                        "#3B82F6", // blue-500
                        "#10B981", // green-500
                        "#8B5CF6", // purple-500
                        "#EC4899", // pink-500
                        "#F59E0B", // amber-500
                        "#6366F1", // indigo-500
                        "#EF4444", // red-500
                    ],
                    borderRadius: 6,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 2,
                    },
                },
            },
        },
    });
}
