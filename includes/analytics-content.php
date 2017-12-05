<main class="mdl-layout__content mdl-color--grey-50">
    <section class="page-content">
        <div class="mdl-grid">
            <!--mdl-cell + mdl-card -->
            <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card" id="visitedCountry">
                <div class="mdl-card__title mdl-color--green-100">
                    <h2 class="mdl-card__title-text">Visited Countries</h2>
                </div>
                <div class="mdl-cell--12-col mdl-card__supporting-text mdl-color--purple-100" id="selectCountry">
                    <form id='countiresForm' action='analytics.php' method='get' class="mdl-cell--5-col">
                        <select class="countryName">
                            <option value="">Select a Country</option>
                        </select>
                    </form>
                    <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card" id = "showBox">
                        <div class="mdl-card__text mdl-color--pink-100" id = "numBox">
                            <i class="material-icons blue">public</i>
                            <p class="mdl-card__text">Number of Visits</p>
                        </div>
                        <div class="mdl-card__supporting-text mdl-color--pink-100" id = "visitor">
                            <p id="EachName">CountryName: </p>
                            <p id="EachNum">Number: </p>
                        </div>
                    </div>
                </div>
            </div>
             <!--mdl-cell + mdl-card -->
            
                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card">
                    <div class="mdl-card__title mdl-color--green-100">
                        <h2 class="mdl-card__title-text">Total Numbers in June 2017</h2>
                    </div>
                    <div class="mdl-cell--12-col mdl-card__supporting-text mdl-color--purple-100" id="totalNum">
                        <div class="mdl-cell mdl-cell--3-col" id="totalNumCard">
                            <div class="mdl-card-text mdl-color--pink-100" id = "numBox">
                                <i class="material-icons blue">public</i>
                                <p class="mdl-card__text">Total Number of Visits</p>
                            </div>
                            <div class="mdl-card-text mdl-color--pink-100" id="totalNum1"></div>
                        </div>
                        
                        <div class="mdl-cell mdl-cell--3-col" id="totalNumCard">
                            <div class="mdl-card-text mdl-color--pink-100" id = "numBox">
                                <i class="material-icons blue">account_balance</i>
                                <p class="mdl-card__text">Total Number of unique countires</p>
                            </div>
                            <div class="mdl-card-text mdl-color--pink-100" id="totalNum2"></div>
                        </div>
                        <div class="mdl-cell mdl-cell--3-col" id="totalNumCard">
                            <div class="mdl-card-text mdl-color--pink-100" id = "numBox">
                                <i class="material-icons blue">share</i>
                                <p class="mdl-card__text">Total Number of Employee to-dos</p>
                            </div>
                            <div class="mdl-card-text mdl-color--pink-100" id="totalNum3"></div>
                        </div>
                        <div class="mdl-cell mdl-cell--3-col" id="totalNumCard">
                            <div class="mdl-card-text mdl-color--pink-100" id = "numBox">
                                <i class="material-icons blue">message</i>
                                <p class="mdl-card__text">Total Number of Employee Messages</p>
                            </div>
                            <div class="mdl-card-text mdl-color--pink-100" id="totalNum4"></div>
                        </div>
                    </div>
                </div>
                     <!--mdl-cell + mdl-card -->
                <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card" id="adoptedBooks">
                    <div class="mdl-card__title mdl-color--green-100">
                        <h2 class="mdl-card__title-text">Adopted Books</h2>
                    </div>
                    <div class="mdl-card__supporting-text mdl-color--purple-100" id="booksTable">
                        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" id="innerTable">
                            <thead>
                                <tr id="everyBook">
                                  <th class="mdl-data-table__cell--non-numeric">BookCover</th>
                                  <th>Title</th>
                                  <th>Sum of the Quantity</th>
                                </tr>
                            </thead>
                            <tbody class="tableBody"></tbody>
                        </table>

                    </div>
                </div>
        </div>
    </section>
</main>