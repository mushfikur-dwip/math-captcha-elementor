jQuery(document).ready(function ($) {
    $('.math-captcha-field').each(function () {
        const firstNum = Math.floor(Math.random() * 10) + 1;
        const secondNum = Math.floor(Math.random() * 10) + 1;
        const operation = '+';
        const question = `${firstNum} ${operation} ${secondNum}`;
        const answer = firstNum + secondNum;

        $(this).find('.math-captcha-question').text(question);
        $(this).find('input[name="math_captcha_answer"]').val(answer);
    });
});
