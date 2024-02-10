import Chart from "chart.js/auto";

$.ajax({
    url: "https://bosseller.net/show",
    method: "GET",
    success: (data) => {
        $("#product").html(data.total.toLocaleString("de-DE"));
        $("#inTrans").html(data.inTrans.toLocaleString("de-DE"));
        $("#outTrans").html(data.outTrans.toLocaleString("de-DE"));

        data.Down5.forEach((data) => {
            $("#down5 tbody").append(
                `
                <div class="grid grid-cols-3 gap-6 font-medium text-gray-900 p-3">
                    <p class="col-span-2"> ` +
                    data.name +
                    `</>
                    <p> ` +
                    data.stock.toLocaleString("de-DE") +
                    `</>

                </div>
            `
            );
        });

        data.Top5.forEach((data) => {
            $("#top5 tbody").append(
                `
                <div class="grid grid-cols-3 gap-6 font-medium text-gray-900 p-3">
                    <p class="col-span-2"> ` +
                    data.name +
                    `</>
                    <p> ` +
                    data.stock.toLocaleString("de-DE") +
                    `</>

                </div>
            `
            );
        });

        data.Stock.forEach((stock) => {
            $("#stockPackage").append(
                `
                <div class="grid grid-cols-6 text-xs w-full gap-5 mb-2 items-center">
                            <p>` +
                    stock.package.name +
                    `</p>
                            <p>` +
                    stock.qtout.toLocaleString("de-DE") +
                    `</p>
                            <div class="col-span-3">
                                <div class="w-full rounded-xl bg-blues h-4">
                                    <div class="bg-blue-600 rounded-xl h-4" style="width: ` +
                    stock.per +
                    `%">
                                    </div>
                                </div>
                            </div>
                            <p>` +
                    stock.qtin.toLocaleString("de-DE") +
                    `</p>
                        </div>
            `
            );
        });

        // Chart Transaction

        const dataTrans = {
            labels: data.Transaction.created, //
            datasets: [
                {
                    label: "In",
                    backgroundColor: "#FFE34E",
                    data: data.Transaction.qty_in,
                    borderRadius: 20,
                    barThickness: 16,
                    barPercentage: 0.7,
                },
                {
                    label: "Out",
                    backgroundColor: "#FE4C24",
                    data: data.Transaction.qty_out,
                    borderRadius: 20,
                    barThickness: 16,
                    barPercentage: 0.7,
                },
            ],
        };

        const config = {
            type: "bar",
            data: dataTrans,
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                        },
                    },
                    y: {
                        grid: {
                            display: false,
                        },
                    },
                },
            },
        };

        new Chart(document.getElementById("myChart"), config);

        // Chart Platform

        const Platformdata = {
            labels: data.Platform.label,
            datasets: [
                {
                    backgroundColor: ["#FE5722", "#0F156E", "#25B522"],
                    data: data.Platform.qty,
                },
            ],
        };

        const Platformconfig = {
            type: "doughnut",
            data: Platformdata,
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                },
            },
        };

        new Chart(document.getElementById("PlatformChart"), Platformconfig);
    },
});
