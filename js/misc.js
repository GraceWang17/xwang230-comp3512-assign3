window.onload = function(){
    toggleFilter();
}
/*
*When the user clicks on the filter button, it should open up and the user
*should be able to see the filter options;
*/
function toggleFilter(){
    var filter = document.getElementById("employeesForm");
    var filterButton = document.getElementById('filterbtn');
    if(filterButton){
        filterButton.addEventListener('click', function(e){
            filter.classList.toggle('hidden');
            if (filterButton.innerHTML == "Show Filter") {
                filterButton.innerHTML = "Hide Filter";
            } else {
                filterButton.innerHTML = "Show Filter";
            }
        });
    }
}

