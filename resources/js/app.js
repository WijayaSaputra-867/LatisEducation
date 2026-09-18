import 'datatables.net-dt/css/dataTables.dataTables.css';
import DataTable from 'datatables.net-dt';

document.addEventListener('DOMContentLoaded', () => {
    const tableElement = document.querySelector('#students-table');

    if (tableElement) {
        const institutionFilter =
            document.querySelector('#institution-filter');

        const table = new DataTable(tableElement, {
            pageLength: 10,
            lengthMenu: [[10, 25, 50], [10, 25, 50]],
            columnDefs: [
                { targets: [2, 3, 4, 5], searchable: false },
                { targets: [4, 5], orderable: false },
            ],
            language: {
                search: '',
                searchPlaceholder: 'Search NIS or name...',
                lengthMenu: 'Show _MENU_ entries',
                info: 'Showing _START_ to _END_ of _TOTAL_ entries',
                infoEmpty: 'Showing 0 to 0 of 0 entries',
                zeroRecords: 'No matching records found',
                emptyTable: 'No student data available',
                paginate: {
                    first: 'First',
                    last: 'Last',
                    next: 'Next',
                    previous: 'Previous',
                },
            },
        });

        DataTable.ext.search.push((settings, data, dataIndex) => {
            if (settings.table !== tableElement) {
                return true;
            }

            const selectedInstitution = institutionFilter?.value ?? '';
            if (!selectedInstitution) {
                return true;
            }

            const row = table.row(dataIndex).node();
            const rowInstitution =
                row?.querySelector('[data-institution-id]')?.dataset.institutionId ?? '';

            return rowInstitution === selectedInstitution;
        });


        institutionFilter?.addEventListener('change', () => {
            table.draw();
        });
    }

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const openButton = document.getElementById('open-sidebar');
    const closeButton = document.getElementById('close-sidebar');

    function openSidebar() {
        sidebar?.classList.remove('-translate-x-full');
        overlay?.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeSidebar() {
        sidebar?.classList.add('-translate-x-full');
        overlay?.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    openButton?.addEventListener('click', openSidebar);
    closeButton?.addEventListener('click', closeSidebar);
    overlay?.addEventListener('click', closeSidebar);

    sidebar?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 1024) {
                closeSidebar();
            }
        });
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            overlay?.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
    });
});
