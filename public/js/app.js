/*
* CONTENT
    1. Показать ответ на вопрос
    2. Показать 'Pop Up' контент
    3. Скрыть 'Pop Up' контент
    4. Показать форму для создания вопроса
    5. Скрыть все '<div class=".errors ...">' при загрузке страницы
    6. Показать сообщение об ошибке
    7. Скрыть сообщение об ошибке
    8. Функции для обновления текста вопроса или ответа
    9. Обновить вопрос
    10. Обновить ответ
    11. Добавить вопрос
    12. Добавить ответ
    13. Удалить вопрос
    14. Удалить ответ
    15. Функция обновления рзмера отступов
    16. Обновить отступ сверху
    17. Обновить отступ снизу
 */
$(document).ready(function() {
// ------------------------------------------------ 1. Показать ответ на вопрос
$(document).on("click", ".question-text", function() {
    const $this = $(this);
    $this.next().slideToggle('fast');
    const $icon = $this.find("i");
    $icon.toggleClass("fa-angle-down fa-angle-up");
    $icon.toggleClass("text-blue-400 text-slate-600");
});

// ---------------------------------------------- 2. Показать 'Pop Up' контент
$(document).on("click", ".show-pop-up-content", function() {
    $(this).next().fadeIn('fast');
});

// ------------------------------------------------ 3. Скрыть 'Pop Up' контент
$(document).on("click", ".close-pop-up-content", function() {
    $(".pop-up-content").fadeOut('fast');
});

// ------------------------------------ 4. Показать форму для создания вопроса
$(document).on("click", ".show-add-question-form", function() {
    const $this = $(this);
    $this.next().slideToggle('fast');
    const $icon = $this.find("i");
    $icon.toggleClass("fa-angle-down fa-angle-up");
    $icon.toggleClass("text-blue-400 text-slate-600");
});

// ----------------------------- 5. Скрыть все '.errors' при загрузке страницы
$('.errors').fadeTo(100, 0);

// ------------------------------------------- 6. Показать сообщение об ошибке
function showMsg(formName, errorMsg) {
    setTimeout(function() {
        $('.' + formName).append(errorMsg).css({'min-height': '2rem'}).fadeTo(100, 1);
    }, 100);
}

// --------------------------------------------- 7. Скрыть сообщение об ошибке
function hideMsg(formName) {
    $('.' + formName).fadeTo(100, 0).empty();
}

// ----------------------- 8. Функции для обновления текста вопроса или ответа
function hideShowErrorsForQuestion(answerOrQuestion, errorMsg)
{
    hideMsg(`${answerOrQuestion}-error`);
    showMsg(`${answerOrQuestion}-error`, errorMsg);
}

function hideShowErrors(answerOrQuestion, idOrName, errorMsg)
{
    hideMsg(`${answerOrQuestion}-error-${idOrName}`);
    showMsg(`${answerOrQuestion}-error-${idOrName}`, errorMsg);
}

function updateQuestionAnswer(nameOrId, inputText, errorMsg, route, answerOrQuestion) {
    let idOrName;
    if (nameOrId === 'id') {
        // id
        idOrName = $(this).attr(nameOrId);
    } else {
        // если nameOrId === 'name', то idOrName = question_text (добавляем вопрос)
        idOrName = inputText;
    }

    let questionOrAnswerText;
    // update
    if (answerOrQuestion === 'question' && nameOrId === 'id') {
        questionOrAnswerText = $(`input[name='${inputText}_${idOrName}']`).val().trim();
    } else if (answerOrQuestion === 'answer' && nameOrId === 'id') {
        questionOrAnswerText = $(`textarea[name='${inputText}_${idOrName}']`).val().trim();
    // store
    } else if (answerOrQuestion === 'question' && nameOrId === 'name') {
        questionOrAnswerText = $(`input[name='${inputText}']`).val().trim();
    } else if (answerOrQuestion === 'answer' && nameOrId === 'id') {
        questionOrAnswerText = $(`textarea[name='${inputText}']`).val().trim();
    }

    const checkQuestionText = questionOrAnswerText.match(/^[A-z0-9А-яёЁ!? .,_'"\-;:@]+$/);

    if (!checkQuestionText) {
        if (nameOrId === 'name') { // добавляем вопрос
            hideShowErrorsForQuestion(answerOrQuestion, errorMsg);
            return false;
        } else {
            hideShowErrors(answerOrQuestion, idOrName, errorMsg)
            return false;
        }
    }
    if (questionOrAnswerText.length < 5 || questionOrAnswerText.length > 250) {
        if (nameOrId === 'name') {
            errorMsg = (questionOrAnswerText.length < 5) ? "Должно быть не менее 5 символов." : "Должно быть не более 250 символов.";
            hideShowErrorsForQuestion(answerOrQuestion, errorMsg);
            return false;
        } else {
            errorMsg = (questionOrAnswerText.length < 5) ? "Должно быть не менее 5 символов." : "Должно быть не более 250 символов.";
            hideShowErrors(answerOrQuestion, idOrName, errorMsg)
            return false;
        }
    }

    const _token = $("input[name='_token']").val();
    // если добавляем новый ответ
    if ( route === 'add-answer' ) { answerOrQuestion = 'question' }
    const postData = {
        [`${answerOrQuestion}_id`]: idOrName,
        [`${inputText}`]: questionOrAnswerText, _token
    };
    $.post(`/${route}`, postData, function(data) {
        if (data === 'ok') {
            location.reload();
        }
    });

    return false;
}

// -------------------------------------------------------- 9. Обновить вопрос
$('.update-question').on("click", function(e) {
    e.preventDefault();
    updateQuestionAnswer.call(this, 'id', 'question_text', "Поле 'Вопрос' пустое или содержит 'плохие' символы.", 'question', 'question');
});

// -------------------------------------------------------- 10. Обновить ответ
$('.update-answer').on("click", function(e) {
    e.preventDefault();
    updateQuestionAnswer.call(this, 'id', 'answer_text', "Поле 'Ответ' пустое или содержит 'плохие' символы.", 'answer', 'answer');
});

// ------------------------------------------------------- 11. Добавить вопрос
$('.add-question').on("click", function(e) {
    e.preventDefault();
    updateQuestionAnswer.call(this, 'name', 'question_text', "Поле 'Вопрос' пустое или содержит 'плохие' символы.", 'add-question', 'question');
});

// -------------------------------------------------------- 12. Добавить ответ
$('.add-answer').on("click", function(e) {
    e.preventDefault();
    updateQuestionAnswer.call(this, 'id', 'answer_text', "Поле 'Ответ' пустое или содержит 'плохие' символы.", 'add-answer', 'answer');
});

// -------------------------------------------------------- 13. Удалить вопрос
$('.delete-question').on("click", function(e) {
    e.preventDefault();
    const questionId = $(this).attr('id');
    const _token = $("input[name='_token']").val();
    $.post('/delete-question', { question_id: questionId, _token }, function(data) {
        if (data === 'ok') {
            location.reload();
        }
    });
});

// --------------------------------------------------------- 14. Удалить ответ
$('.delete-answer').on("click", function(e) {
    e.preventDefault();
    const answerId = $(this).attr('id');
    const _token = $("input[name='_token']").val();
    $.post('/delete-answer', { answer_id: answerId, _token }, function(data) {
        if (data === 'ok') {
            location.reload();
        }
    });
});

// ------------------------------------ 15. Функция обновления рзмера отступов
// see 'resources/views/layouts/home.blade.php' line 29
function updateMargin(newMargin, type) {
    const _token = $("input[name='_token']").val();
    const postData = { [type]: newMargin, _token };
    $.post(`/update-margin-${type}`, postData, function(data) {
        if (data === 'ok') {
            location.reload();
        }
    });
}

// ------------------------------------------------ 16. Обновить отступ сверху
$('.margin-top').on("click", function(e) {
    const newMarginTop = $(this).text();
    updateMargin(newMarginTop, 'top');
});

// ------------------------------------------------- 17. Обновить отступ снизу
$('.margin-bottom').on("click", function(e) {
    const newMarginBottom = $(this).text();
    updateMargin(newMarginBottom, 'bottom');
});

});
