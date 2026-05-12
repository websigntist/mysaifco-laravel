$(function () {
    var theme = $("html").attr("data-bs-theme") === "dark" ? "default-dark" : "default";
    $("#jstree-checkbox").jstree({
        core: {
            themes: {name: theme}
        },
    });

    // Toggle checkbox when clicking anywhere within jstree-anchor
    $("#jstree-checkbox").on("click", ".jstree-anchor", function (e) {
        e.preventDefault(); // Prevent default jstree behavior
        var nodeId = $(this).parent().attr("id");
        var checkbox = $(`#${nodeId}`).find(".jstree-checkbox").first();
        var isChecked = !checkbox.prop("checked");
        checkbox.prop("checked", isChecked);
        updateSelectedMessage();

        // Cascade check/uncheck children when parent anchor is clicked
        var node = $("#jstree-checkbox").jstree(true).get_node(nodeId);
        if (node.children.length) {
            function checkDescendants(nodeId, checked) {
                var node = $("#jstree-checkbox").jstree(true).get_node(nodeId);
                node.children.forEach(function (childId) {
                    $(`input[value="${childId}"]`).prop("checked", checked);
                    checkDescendants(childId, checked);
                });
            }

            checkDescendants(nodeId, isChecked);
            updateSelectedMessage();
        }

        // Open all ancestor nodes if any checkbox is checked
        if (isChecked) {
            var currentNode = node;
            while (currentNode.parent !== "#") {
                currentNode = $("#jstree-checkbox").jstree(true).get_node(currentNode.parent);
                $("#jstree-checkbox").jstree(true).open_node(currentNode);
            }
        }
    });

    // Update selected nodes message
    function updateSelectedMessage() {
        var checked = $("input.jstree-checkbox:checked").map(function () {
            return $(this).val();
        }).get();
        $("#form_message").text("Selected: " + (checked.length ? checked.join(", ") : "None"));
    }

    // Form validation
    $("#jstree_form").on("submit", function (e) {
        var checked = $("input.jstree-checkbox:checked");
        if (checked.length === 0) {
            e.preventDefault();
            $("#form_message").text("Please select at least one node.");
            return false;
        }
    });
});
