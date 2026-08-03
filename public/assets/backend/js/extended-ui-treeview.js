$(function () {
    var $tree = $("#jstree-checkbox");
    if (!$tree.length) return;

    var theme = $("html").attr("data-bs-theme") === "dark" ? "default-dark" : "default";

    // Initialize jstree
    $tree.jstree({
        core: {
            themes: { name: theme }
        }
    });

    // Open all nodes by default
    $tree.jstree("open_all");

    // Click handler for jstree node links/labels
    $tree.on("click", ".jstree-anchor", function (e) {
        e.preventDefault();
        var $li = $(this).closest("li");
        var primaryCheckbox = $li.children("input[type='checkbox']").first();
        var isChecked = !primaryCheckbox.prop("checked");

        // Toggle module checkbox and all action/nested checkboxes inside this module
        $li.find("input[type='checkbox']").prop("checked", isChecked);

        // If checking, also check parent module checkboxes up the tree
        if (isChecked) {
            $li.parents("li").children("input[type='checkbox']").prop("checked", true);
        }
        updateSelectedMessage();
    });

    // Direct checkbox toggle handler
    $tree.on("change", "input[type='checkbox']", function () {
        var isChecked = $(this).prop("checked");
        var $li = $(this).closest("li");

        // If module checkbox is toggled, toggle all action/nested checkboxes under it
        if ($(this).attr("name") === "modules[]") {
            $li.find("input[type='checkbox']").prop("checked", isChecked);
        }

        // If an action or nested module is checked, check parent module checkboxes
        if (isChecked) {
            $li.parents("li").children("input[type='checkbox']").prop("checked", true);
        }
        updateSelectedMessage();
    });

    // Helper message update
    function updateSelectedMessage() {
        if ($("#form_message").length) {
            var count = $tree.find("input[type='checkbox']:checked").length;
            $("#form_message").text("Selected permissions count: " + count);
        }
    }

    // CRITICAL: Prevent lost checkboxes on submit (even if collapsed by jstree)
    $(document).on("submit", "form", function () {
        var $formTree = $(this).find("#jstree-checkbox");
        if (!$formTree.length) return;

        // Open all nodes in jstree so DOM elements exist
        $formTree.jstree("open_all");

        // Remove any previous hidden clones
        $(this).find(".jstree-hidden-submit-input").remove();

        var $form = $(this);

        // Clone all checked checkboxes as hidden inputs attached directly to the form
        $formTree.find("input[type='checkbox']:checked").each(function () {
            var name = $(this).attr("name");
            var val = $(this).val();
            if (name && val !== undefined) {
                $("<input>", {
                    type: "hidden",
                    class: "jstree-hidden-submit-input",
                    name: name,
                    value: val
                }).appendTo($form);
            }
        });
    });
});
