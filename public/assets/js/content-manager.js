(function() {
    atomic(`get-content/${page}`)
        .then(function(response) {
            const result = response.data;
            const xhr = response.xhr;
            if (xhr.status && result) {
                const parsedResult = result.message;
                const parsedContent = JSON.parse(parsedResult.content);
                const parsedContentStyles = JSON.parse(parsedResult.styles);
                // Load html
                $("#content").html(parsedContent);
                // Load css
                $("head").append(`<style>${parsedContentStyles}</style>`);
            }
        })
        .catch(function(error) {
            console.log(error.status); // xhr.status
            console.log(error.statusText); // xhr.statusText
        });
})();
