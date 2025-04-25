@extends("dashboard::dashboard")

@section('content')
    <div class="container mt-4">
        <h3 class="mb-3">Admin Navigation</h3>

        <ul class="sortable list-group main-list" id="sortable-menu">
            <!-- Users -->
            <li class="list-group-item main-item" data-id="users">
                <div class="menu-title">Users</div>
                <ul class="sub-menu list-group">
                    <li class="list-group-item sub-item" data-id="users-all">All Users</li>
                    <li class="list-group-item sub-item" data-id="users-likes">Users Like</li>
                </ul>
            </li>

            <!-- Posts -->
            <li class="list-group-item main-item" data-id="posts">
                <div class="menu-title">Posts</div>
                <ul class="sub-menu list-group">
                    <li class="list-group-item sub-item" data-id="posts-all">All Posts</li>
                    <li class="list-group-item sub-item" data-id="posts-create">Create Post</li>
                </ul>
            </li>

            <!-- Settings -->
            <li class="list-group-item main-item" data-id="settings">
                <div class="menu-title">Settings</div>
                <ul class="sub-menu list-group">
                    <li class="list-group-item sub-item" data-id="settings-general">General</li>
                    <li class="list-group-item sub-item" data-id="settings-security">Security</li>
                </ul>
            </li>
        </ul>

        <div class="buttons d-flex justify-content-end m-3">
            <button class="btn btn-primary mr-3" id="add-item">Add Item</button>
            <button class="btn btn-success" id="save-order">Save Order</button>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            function makeSortable() {
                // Sortable for main items
                $("#sortable-menu").sortable({
                    items: ".main-item",
                    handle: ".menu-title",
                    connectWith: ".main-list",
                    placeholder: "sortable-placeholder",
                    update: function (event, ui) {
                        adjustItemType(ui.item);
                    }
                });

                // Sortable for sub-items
                $(".sub-menu").sortable({
                    connectWith: ".sub-menu, #sortable-menu",
                    placeholder: "sortable-placeholder",
                    update: function (event, ui) {
                        adjustItemType(ui.item);
                    }
                });
            }

            function adjustItemType(item) {
                let parentList = item.parent();

                if (parentList.attr("id") === "sortable-menu") {
                    // If moved to main list, make it a main item
                    item.removeClass("sub-item").addClass("main-item");

                    // Ensure it has a sub-menu for child items
                    if (!item.children(".sub-menu").length) {
                        item.append('<ul class="sub-menu list-group" draggable="true"></ul>');
                    }
                } else {
                    // If moved inside another item, make it a sub-item
                    item.removeClass("main-item").addClass("sub-item");
                    item.children(".sub-menu").remove(); // Remove sub-menu when becoming a sub-item
                }

                // Reinitialize sorting
                makeSortable();
            }


            function getOrder() {
                let order = [];
                $("#sortable-menu > .main-item").each(function () {
                    let parent = $(this).data("id");
                    let children = [];

                    $(this).find(".sub-menu .sub-item").each(function () {
                        children.push($(this).data("id"));
                    });

                    order.push({ parent: parent, children: children });
                });
                return order;
            }

            $("#save-order").click(function () {
                let menuOrder = getOrder();
                console.log(menuOrder);
                alert("Order saved! Check console for structure.");
            });

            $("#add-item").click(function () {
                $(".main-list").append(`
                    <li class="list-group-item main-item" data-id="new-item">
                        <div class="menu-title">New Item</div>
                        <ul class="sub-menu list-group"></ul>
                    </li>
                `);
                makeSortable(); // Make sure new items are draggable
            });

            makeSortable(); // Initialize sorting on load
        });
    </script>
@endpush
