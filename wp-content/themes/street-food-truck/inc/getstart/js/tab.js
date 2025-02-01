function street_food_truck_open_tab(evt, cityName) {
    var street_food_truck_i, street_food_truck_tabcontent, street_food_truck_tablinks;
    street_food_truck_tabcontent = document.getElementsByClassName("tabcontent");
    for (street_food_truck_i = 0; street_food_truck_i < street_food_truck_tabcontent.length; street_food_truck_i++) {
        street_food_truck_tabcontent[street_food_truck_i].style.display = "none";
    }
    street_food_truck_tablinks = document.getElementsByClassName("tablinks");
    for (street_food_truck_i = 0; street_food_truck_i < street_food_truck_tablinks.length; street_food_truck_i++) {
        street_food_truck_tablinks[street_food_truck_i].className = street_food_truck_tablinks[street_food_truck_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});