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

    // Collapse all nodes on page load by default
    $tree.jstree("close_all");

    // Helper: Update selected count message if container exists
    function updateSelectedMessage() {
        if ($("#form_message").length) {
            var count = $tree.find("input[type='checkbox']:checked").length;
            $("#form_message").text("Selected permissions count: " + count);
        }
    }

    // 1. Direct checkbox change handler (Handles native checkbox clicks)
    $tree.on("change", "input[type='checkbox']", function (e) {
        e.stopPropagation();

        var isChecked = $(this).prop("checked");
        var $li = $(this).closest("li");
        var isModule = $(this).attr("name") === "modules[]";

        if (isModule) {
            // Module checkbox toggled -> open node so children exist in DOM, set all child checkboxes
            $tree.jstree("open_node", $li);
            $li.find("input[type='checkbox']").prop("checked", isChecked);

            // If checking, ensure parent module checkboxes up the tree are checked
            if (isChecked) {
                $li.parents("li").children("input[name='modules[]']").prop("checked", true);
            }
        } else {
            // Action checkbox toggled
            if (isChecked) {
                // Ensure parent module checkbox & ancestors are checked
                $li.parents("li").children("input[name='modules[]']").prop("checked", true);
            } else {
                // If action unchecked, check if any remaining actions under this module are checked
                var $moduleLi = $li.closest("li[id^='node-']").not($li);
                if ($moduleLi.length) {
                    var hasCheckedActions = $moduleLi.find("input[name^='actions[']:checked").length > 0;
                    if (!hasCheckedActions) {
                        $moduleLi.children("input[name='modules[]']").prop("checked", false);
                    }
                }
            }
        }
        updateSelectedMessage();
    });

    // 2. Click handler on text label -> trigger change on its checkbox
    $tree.on("click", "label", function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $checkbox = $(this).siblings("input[type='checkbox']").first();
        if (!$checkbox.length) {
            $checkbox = $(this).closest("li").children("input[type='checkbox']").first();
        }

        if ($checkbox.length) {
            var newState = !$checkbox.prop("checked");
            $checkbox.prop("checked", newState).trigger("change");
        }
    });

    // 3. Click handler on jstree anchor -> delegate to label/checkbox (ignore tree arrow .jstree-ocl)
    $tree.on("click", ".jstree-anchor", function (e) {
        if ($(e.target).hasClass("jstree-ocl") || $(e.target).closest(".jstree-ocl").length) {
            return; // Tree arrow collapse/expand only
        }

        e.preventDefault();
        e.stopPropagation();

        var $label = $(this).find("label").first();
        if ($label.length) {
            $label.trigger("click");
        } else {
            var $checkbox = $(this).siblings("input[type='checkbox']").first();
            if ($checkbox.length) {
                var newState = !$checkbox.prop("checked");
                $checkbox.prop("checked", newState).trigger("change");
            }
        }
    });

    // 4. On form submission: expand tree & clone all checked checkboxes into hidden inputs
    $(document).on("submit", "form", function () {
        var $formTree = $(this).find("#jstree-checkbox");
        if (!$formTree.length) return;

        // Open all nodes so all DOM elements exist for cloning
        $formTree.jstree("open_all");

        // Remove previous hidden submit clones
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
