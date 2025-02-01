function adventure_camping_open_tab(evt, cityName) {
    var adventure_camping_i, adventure_camping_tabcontent, adventure_camping_tablinks;
    adventure_camping_tabcontent = document.getElementsByClassName("tabcontent");
    for (adventure_camping_i = 0; adventure_camping_i < adventure_camping_tabcontent.length; adventure_camping_i++) {
        adventure_camping_tabcontent[adventure_camping_i].style.display = "none";
    }
    adventure_camping_tablinks = document.getElementsByClassName("tablinks");
    for (adventure_camping_i = 0; adventure_camping_i < adventure_camping_tablinks.length; adventure_camping_i++) {
        adventure_camping_tablinks[adventure_camping_i].className = adventure_camping_tablinks[adventure_camping_i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

jQuery(document).ready(function () {
    jQuery( ".tab-sec .tablinks" ).first().addClass( "active" );
});