<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sorting program</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container overflow-hidden pt-5">
            <form>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Input text here</label>
                    <input type="text" class="form-control" id="sortInput">
                    <div id="sortInputHelp" class="form-text">Numbers or special characters are not accepted.</div>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="sortingMethod">
                        <option selected value="0">Sorting method</option>
                        <?php foreach($algorithms as $algorithm) { ?>
                            <option value="<?php print $algorithm['id']; ?>"><?php print $algorithm['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" id="sortButton">Submit</button>
                </div>
                <div class="mb-3">
                    <label class="form-label" id="sortOutput">Output will be shown here.</label>
                </div>
                
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="/view/js/sort.js"></script>
    </body>
</html>