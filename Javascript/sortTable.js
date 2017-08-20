function sortTable(tbody, columnIndex, isInt) {
    console.log("Goes in");
    var rows, switching, i, x, y, shouldSwitch;
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = tbody.getElementsByTagName("tr");
        /*Loop through all tbody rows (except the
        first, which contains tbody headers):*/
        for (i = 0; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("td")[columnIndex-1].innerHTML;
            y = rows[i + 1].getElementsByTagName("td")[columnIndex-1].innerHTML;
            console.log(x + " - " + y);
            if(isInt){
                x = parseInt(x);
                y = parseInt(y);
            }else{
                x = x.toLowerCase().trim();
                y = y.toLowerCase().trim();
            }
            //check if the two rows should switch place:
            if (x > y) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
            }
        }
        if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}