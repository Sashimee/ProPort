// global vars
const pokemonsList = $("#pokemon-list");
const firstSelectItem = $("option");
const ul = $(".pokelist");
const liMockup = $("#li-mockup");
// populate select options
$.ajax({
    method: "GET",
    url: "https://pokeapi.co/api/v2/pokemon/?limit=1000"
        //deducted from https: //pokeapi.co/api/v2/pokemon/?offset=20&limit=20"
}).done(function(pokeList) {
    for (const pokemon of pokeList.results) {
        const firstSelectItemClone = firstSelectItem.clone();
        firstSelectItemClone.prop("value", pokemon.name);
        firstSelectItemClone.text(capitalize(pokemon.name));
        pokemonsList.append(firstSelectItemClone);
    }
});
//listener on submit
$("form").on("submit", pokemonChoice);
//output function
function pokemonChoice() {
    event.preventDefault();
    const userChoice = $("select").prop("value");

    //cleanLI
    liMockup.remove();
    $(".disposable").remove();
    //call the api with user choice
    $.ajax({
        method: "GET",
        url: ("https://pokeapi.co/api/v2/pokemon/" + userChoice)
    }).done(function(pokeList) {
        //clean images
        $(".disposable").remove();
        //create img element
        const imageSkeletal = $("<img>");
        imageSkeletal.attr("src", pokeList.sprites.front_default);
        imageSkeletal.attr("class", "disposable")
        $(".flexer").append(imageSkeletal);
        //populate unordered list
        for (const attack of pokeList.abilities) {
            const liMockupClone = liMockup.clone();
            liMockupClone.attr("class", "disposable")
            liMockupClone.text(capitalize(attack.ability.name));
            ul.append(liMockupClone);
        }
    });
}
//capitalize_Words https://www.w3resource.com/javascript-exercises/javascript-string-exercise-9.php
function capitalize(str) {
    return str.replace(/\w\S*/g, function(txt) { return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase(); });
};