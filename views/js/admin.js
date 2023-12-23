function showMessageDeleteCategory(id, name) {
    document.getElementById("categoryNameDelete").innerText = name;
    document.getElementById("categoryIdDelete").value =id;

}

function showValueUpdateCategory(id, name) {
    document.getElementById("categoryNameUpdate").value = name;
    document.getElementById("categoryIdUpdate").value =id;

}
function showMessageDeleteTag(id, name) {
    document.getElementById("tagNameDelete").innerText = name;
    document.getElementById("tagIdDelete").value =id;

}

function showValueUpdateTag(id, name,status) {
    document.getElementById("tagNameUpdate").value = name;
    document.getElementById("tagIdUpdate").value =id;
    document.getElementById("tagStatusUpdate").value =status;


}