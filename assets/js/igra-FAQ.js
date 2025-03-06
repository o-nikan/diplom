function toggleFAQ(element) {
    let allFaqItems = document.querySelectorAll(".faq-item");
    
    allFaqItems.forEach(item => {
        if (item !== element.parentElement) {
            item.classList.remove("active");
            item.querySelector(".faq-answer").style.maxHeight = null;
        }
    });

    let faqItem = element.parentElement;
    let faqAnswer = faqItem.querySelector(".faq-answer");

    if (faqItem.classList.contains("active")) {
        faqItem.classList.remove("active");
        faqAnswer.style.maxHeight = null;
    } else {
        faqItem.classList.add("active");
        faqAnswer.style.maxHeight = faqAnswer.scrollHeight + "px";
    }
}