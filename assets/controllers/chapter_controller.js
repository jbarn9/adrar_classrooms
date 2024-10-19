import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
  loadChapter(event) {
    const chapterId = event.currentTarget.getAttribute("data-id");
    const turboFrame = document.querySelector("#chapter_frame");

    turboFrame.src = `/chapters/${chapterId}`;
  }
}
