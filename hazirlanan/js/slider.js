var slider = document.getElementById("myRange");
document.getElementById("vade_gun_sayisi").value = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
    document.getElementById("vade_gun_sayisi").value = this.value;
}
