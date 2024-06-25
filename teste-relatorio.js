document.addEventListener('DOMContentLoaded', function () {
    const periodRadios = document.querySelectorAll('input[name="period"]');
    const customDateInputs = document.getElementById('custom-date');
    const generateReportButton = document.getElementById('generate-report');
    const reportTableBody = document.querySelector('#report-table tbody');
    const reportPeriod = document.getElementById('report-period');
    const presentCount = document.getElementById('present-count');
    const absentCount = document.getElementById('absent-count');

    periodRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'custom') {
                customDateInputs.style.display = 'block';
            } else {
                customDateInputs.style.display = 'none';
            }
        });
    });

    generateReportButton.addEventListener('click', function () {
      
        const mockData = [
            { date: '01/05/2024', patient: 'Maria Silva', status: 'Presente' },
            { date: '01/05/2024', patient: 'João Souza', status: 'Ausente' },
            { date: '02/05/2024', patient: 'Ana Costa', status: 'Presente' },
            { date: '02/05/2024', patient: 'Pedro Martins', status: 'Presente' },
            { date: '03/05/2024', patient: 'Carla Fernandes', status: 'Ausente' },
            { date: '03/05/2024', patient: 'Roberto Lima', status: 'Presente' },
            { date: '04/05/2024', patient: 'Júlia Oliveira', status: 'Ausente' },
            { date: '04/05/2024', patient: 'Marcelo Santos', status: 'Presente' },
        ];

        // Isso limpa as linhas existentes
        reportTableBody.innerHTML = '';

        // Popular a tabela com o array que foi dado
        let presentCountVal = 0;
        let absentCountVal = 0;

        mockData.forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${row.date}</td>
                <td>${row.patient}</td>
                <td>${row.status}</td>
            `;
            reportTableBody.appendChild(tr);

            if (row.status === 'Presente') {
                presentCountVal++;
            } else {
                absentCountVal++;
            }
        });

        // Atualizar total 
        presentCount.textContent = presentCountVal;
        absentCount.textContent = absentCountVal;

        // Atualizar o periodo de relatorio (tentar deixar dinamico)
        // reportPeriod.textContent = 'Período: 01/05/2024 a 31/05/2024';
    });
});
