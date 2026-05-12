{{--ordering--}}
<script>
    // Shift+Click Range Selection
    document.addEventListener("DOMContentLoaded", function () {
        let lastChecked = null;
        const checkboxes = document.querySelectorAll('.childCheckbox');
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('click', function (e) {
                if (e.shiftKey && lastChecked) {
                    e.preventDefault();
                    const start = Array.from(checkboxes).indexOf(lastChecked);
                    const end = Array.from(checkboxes).indexOf(this);
                    const rangeStart = Math.min(start, end);
                    const rangeEnd = Math.max(start, end);
                    const shouldCheck = this.checked;
                    let count = 0;
                    checkboxes.forEach((cb, i) => {
                        if (i >= rangeStart && i <= rangeEnd) {
                            cb.checked = shouldCheck;
                            count++;
                            const row = cb.closest('tr');
                            if (row) {
                                row.style.transition = 'background-color 0.3s ease';
                                row.style.backgroundColor = '#E3F2FD';
                                setTimeout(() => {
                                    row.style.backgroundColor = '';
                                }, 600);
                            }
                        }
                    });
                    Notiflix.Notify.info(`${count} item${count !== 1 ? 's' : ''} ${shouldCheck ? 'selected' : 'deselected'}`);
                }
                lastChecked = this;
            });
        });
        const selectAllCheckbox = document.getElementById('selectAll');
        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function () {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                    const someChecked = Array.from(checkboxes).some(cb => cb.checked);
                    selectAllCheckbox.checked = allChecked;
                    selectAllCheckbox.indeterminate = someChecked && !allChecked;
                });
            });
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".ordering").forEach(input => {

            input.addEventListener("blur", function () {
                const id = this.getAttribute("data-id");
                const value = this.value.trim();

                if (!value) return;

                // Optional: show loading spinner while updating
                Notiflix.Loading.circle('Updating ordering...');

                fetch("{{ route($module . '.update-ordering') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        id: id,
                        ordering: value
                    })
                })
                    .then(res => res.json())
                    .then(data => {
                        Notiflix.Loading.remove();
                        if (data.success) {
                            Notiflix.Notify.success("Ordering updated successfully!");
                        } else {
                            Notiflix.Notify.warning(data.message || "No changes detected.");
                        }
                        console.log("Ordering updated:", data);
                    })
                    .catch(err => {
                        Notiflix.Loading.remove();
                        console.error("Error updating ordering:", err);
                        Notiflix.Notify.failure("Failed to update ordering.");
                    });
            });
        });
    });
</script>
{{--view modal--}}

{{--delete--}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".deleteBtn").forEach(btn => {
            btn.addEventListener("click", async function () {
                const id = this.getAttribute("data-id");
                const url = "{{ url('admin/'.$module.'/delete') }}/" + id;

                // Notiflix confirmation dialog
                Notiflix.Confirm.show(
                    'Confirm Delete',
                    'Are you sure you want to delete this {{$title}}? This action cannot be undone.',
                    'Yes, Delete',
                    'Cancel',
                    async () => {
                        // Show loading while deleting
                        Notiflix.Loading.standard('Deleting...');

                        try {
                            const response = await fetch(url, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "X-Requested-With": "XMLHttpRequest"
                                }
                            });

                            if (!response.ok) throw new Error(`HTTP error ${response.status}`);

                            const data = await response.json();
                            Notiflix.Loading.remove();

                            if (data.success) {
                                Notiflix.Notify.failure(data.message || '{{ucfirst($title)}} deleted successfully.');

                                // Remove table row instantly
                                const row = this.closest("tr");
                                if (row) row.remove();

                            } else {
                                Notiflix.Notify.failure(data.message || 'Failed to delete {{$title}}.');
                            }
                        } catch (error) {
                            Notiflix.Loading.remove();
                            console.error("Delete error:", error);
                            Notiflix.Notify.failure('Error deleting record. Please try again.');
                        }
                    },
                    () => {
                        // Cancel callback
                        Notiflix.Notify.info('Delete cancelled.');
                    },
                    {
                        width: '320px',
                        borderRadius: '8px',
                        okButtonBackground: '#E3342F',
                        titleColor: '#333333',
                        messageColor: '#666666',
                        buttonsFontSize: '15px'
                    }
                );
            });
        });
    });
</script>
{{--status--}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".toggleStatusBtn").forEach(btn => {
            btn.addEventListener("click", function (e) {
                e.preventDefault();

                const dataId = this.getAttribute("data-id");
                const currentStatus = this.getAttribute("data-current-status");
                const url = `/admin/{{$module}}/${dataId}/status`;

                // Optional: show loading indicator
                Notiflix.Loading.circle('Updating status...');

                fetch(url, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"
                    },
                    body: JSON.stringify({status: currentStatus})
                })
                    .then(res => res.json())
                    .then(data => {
                        Notiflix.Loading.remove(); // remove loading

                        if (data.success) {
                            // Update label
                            const statusLabel = document.getElementById("statusLabel-" + dataId);
                            if (statusLabel) {
                                statusLabel.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                                statusLabel.className =
                                    ['Active', 'Published'].includes(data.status)
                                        ? "badge bg-label-success"
                                        : "badge bg-label-danger";
                            }

                            // Update button attribute
                            this.setAttribute("data-current-status", data.status);

                            // Success notification
                            Notiflix.Notify.success(data.message || "Status updated successfully");
                        } else {
                            Notiflix.Notify.failure(data.message || "Failed to update status");
                        }
                    })
                    .catch(err => {
                        console.error("Status update error:", err);
                        Notiflix.Loading.remove();
                        Notiflix.Notify.failure("Error updating status. Please try again.");
                    });
            });
        });
    });
</script>
