function toggleBlock(element) {
    const content = element.nextElementSibling;

    if (content.style.display === "block") { 
        content.style.display = "none"; // ouvrir le bloc
    } else {
        content.style.display = "block"; // réduire le bloc
    }
}