const inputs = document.querySelectorAll("input");
const g = document.getElementById("genres-js")
const a = document.getElementById("authors-js")
var genres = g.value.split(',');
var authors = a.value.split(',');
if (genres[0] == '')
{
    genres = [];
}
if (authors[0] == '')
{
    authors = [];
}

inputs.forEach(el => {
    el.addEventListener("click", () => {
        if (el.type == "checkbox")
        {
            if (el.classList.contains('genre-check-js'))
            {
                if (!el.checked)
                {
                    let index = genres.indexOf(el.value);
                    if (index !== -1) {
                        genres.splice(index, 1);
                        elem = genres.join(',')
                        g.value = elem
                    }

                }
                else {
                    genres.push(el.value);
                    elem = genres.join(',')
                    g.value = elem
                }
            }
            if (el.classList.contains('author-check-js'))
            {
                if (!el.checked)
                {
                    let index = authors.indexOf(el.value);
                    if (index !== -1) {
                        authors.splice(index, 1);
                        elem = authors.join(',')
                        a.value = elem
                    }
                }
                else {
                    authors.push(el.value);
                    elem = authors.join(',')
                    a.value = elem
                }
            }
        }
     });
        // //var data = [1, 2, 3, 4, 5];
        // $.ajax({
        //     type: "POST",
        //     data: {myarr: genres},
        //     url: "app/controller/book.php",
        //     success: function(data) {
        //         alert(data);
        //     }
        // });

    //  submit.addEventListener("click", () => {
    //     data = {
    //         'genres': genres,
    //         'authors': authors
    //     }
    //     const response = fetch('app/controller/book.php', {
    //         method: 'POST',
    //         headers: {
    //         'Content-Type': 'application/json;charset=utf-8',
    //         },
    //         body: JSON.stringify(data),
    //     })
    //     .then(response => (response.json()))
    //  })
});