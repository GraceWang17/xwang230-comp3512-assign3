<!--/**-->
<!-- * Generate the header for help pages-->
<!-- * @return string generated HTML-->
<!-- **/-->
<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <h1 class="mdl-layout-title"><span>Welcome</span> Bookstore</h1>
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                          mdl-textfield--floating-label mdl-textfield--align-right">
            <label id="item1" class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">account_box</label>
            <div class="mdl-tooltip" for="item1">Messages</div>
                    
            <label id="item2" class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">notifications</label>
            <div class="mdl-tooltip" for="item2">Notifications</div>
                    
            <label id="item3" class="material-icons mdl-badge mdl-badge--overlap" data-badge="0">favorite</label>
            <div class="mdl-tooltip" for="item3">Favorites</div>
                    
            <label class="mdl-button mdl-js-button mdl-button--icon"
            for="fixed-header-drawer-exp">
            <i class="material-icons">search</i>
            <?php include "search.php";?>
            </label>
            <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" name="sample"
                    id="fixed-header-drawer-exp">
            </div>
        </div>
    </div>
</header>