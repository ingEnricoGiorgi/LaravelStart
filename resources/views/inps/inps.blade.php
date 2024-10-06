<?php
// Parametri iniziali basati sull'articolo
$patrimonioInps = 5000000000; // Saldo INPS iniziale in €
$spesaAnnuaPensioni = 1000000000; // Spesa annua per pensioni in €
$entrateAnnueContributi = 800000000; // Entrate annuali da contributi in €
$anni = 0;

// Array con i dati dei pensionati per gli anni basati sull'articolo
$numeroPensionati = [
    2024 => 16,
    2025 => 16.3,
    2026 => 16.6,
    2027 => 16.9,
    2028 => 17.2,
    2029 => 17.5,
    2030 => 17.8,
    2031 => 18.1,
    2032 => 18.4,
    2033 => 18.7,
    2034 => 19,
    2035 => 19.3,
    2036 => 19.6,
    2037 => 19.9,
    2038 => 20,
    2040 => 20,
    2048 => 19.8,
    2060 => 19.5
];

// Dati delle pensioni e dei pensionati per il 2021 e 2022 (in milioni)
$datiPensionati = [
    'Anno' => ['2021', '2022'],
    'Maschi' => [7.767189, 7.794325],
    'Femmine' => [8.331559, 8.337089],
    'Totale' => [16.098748, 16.131414]
];

// Dati dell'importo medio delle pensioni per maschi e femmine (euro)
$importoMedio = [
    'Anno' => ['2021', '2022'],
    'Maschi' => [22.598, 23.167],
    'Femmine' => [16.501, 16.991],
    'Totale' => [19.443, 19.976]
];
?>

    <!-- Includi Chart.js dalla CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Crea un container per ogni grafico con ID univoco -->
<div style="width: 80%; margin: 20px auto; text-align: center;">
    <h2>Numero di Pensionati (Proiezione 2024-2060)</h2>
    <canvas id="proiezionePensionatiChart" style="max-width: 100%; height: 500px;"></canvas>
</div>

<div style="width: 80%; margin: 20px auto; text-align: center;">
    <h2>Numero di Pensionati e Pensioni (2021-2022)</h2>
    <canvas id="pensionati2021_2022Chart" style="max-width: 100%; height: 400px;"></canvas>
</div>

<div style="width: 80%; margin: 20px auto; text-align: center; margin-top: 50px;">
    <h2>Importo Medio Annuo delle Pensioni (2021-2022)</h2>
    <canvas id="importoMedioChart" style="max-width: 100%; height: 400px;"></canvas>
</div>

<script>
    // Grafico del numero di pensionati (Proiezioni 2024-2060)
    const anniProiezione = <?php echo json_encode(array_keys($numeroPensionati)); ?>;
    const pensionatiProiezione = <?php echo json_encode(array_values($numeroPensionati)); ?>;
    const ctxProiezione = document.getElementById('proiezionePensionatiChart').getContext('2d');
    const proiezionePensionatiChart = new Chart(ctxProiezione, {
        type: 'line',
        data: {
            labels: anniProiezione,
            datasets: [{
                label: 'Numero di Pensionati (in milioni)',
                data: pensionatiProiezione,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Anno'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Numero di Pensionati (in milioni)'
                    },
                    suggestedMin: 15,
                    suggestedMax: 21
                }
            }
        }
    });

    // Grafico del numero di pensionati (2021-2022)
    const ultimiAnni = <?php echo json_encode($datiPensionati['Anno']); ?>;
    const pensionatiMaschi = <?php echo json_encode($datiPensionati['Maschi']); ?>;
    const pensionatiFemmine = <?php echo json_encode($datiPensionati['Femmine']); ?>;
    const pensionatiTotale = <?php echo json_encode($datiPensionati['Totale']); ?>;
    const ctxPensionati2021_2022 = document.getElementById('pensionati2021_2022Chart').getContext('2d');
    const pensionati2021_2022Chart = new Chart(ctxPensionati2021_2022, {
        type: 'bar',
        data: {
            labels: ultimiAnni,
            datasets: [
                {
                    label: 'Pensionati Maschi (milioni)',
                    data: pensionatiMaschi,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Pensionati Femmine (milioni)',
                    data: pensionatiFemmine,
                    backgroundColor: 'rgba(255, 159, 64, 0.6)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Totale Pensionati (milioni)',
                    data: pensionatiTotale,
                    backgroundColor: 'rgba(153, 102, 255, 0.6)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Numero di Pensionati per Sesso e Totale (2021-2022)'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Anno'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Numero di Pensionati (milioni)'
                    }
                }
            }
        }
    });

    // Grafico dell'importo medio delle pensioni (2021-2022)
    const importoMaschi = <?php echo json_encode($importoMedio['Maschi']); ?>;
    const importoFemmine = <?php echo json_encode($importoMedio['Femmine']); ?>;
    const importoTotale = <?php echo json_encode($importoMedio['Totale']); ?>;
    const ctxImportoMedio = document.getElementById('importoMedioChart').getContext('2d');
    const importoMedioChart = new Chart(ctxImportoMedio, {
        type: 'line',
        data: {
            labels: ultimiAnni,
            datasets: [
                {
                    label: 'Importo Medio Maschi (€)',
                    data: importoMaschi,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    borderWidth: 2
                },
                {
                    label: 'Importo Medio Femmine (€)',
                    data: importoFemmine,
                    borderColor: 'rgba(255, 159, 64, 1)',
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    fill: true,
                    borderWidth: 2
                },

                {
                    label: 'Importo Medio Totale (€)',
                    data: importoTotale,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: true,
                    borderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Importo Medio Annuo delle Pensioni per Sesso (2021-2022)'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Anno'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Importo Medio Annuo (€)'
                    }
                }
            }
        }
    });
</script>
