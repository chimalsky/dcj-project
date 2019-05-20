import { Controller } from "stimulus"
import $ from 'jquery'

export default class extends Controller {
  connect() {
    console.log("Hello, Stimulus!", this.element)
  }

  dateClick(event) {
    let conflictYear = +this.data.get('conflict-year')
    let input = $(event.currentTarget).find('.flatpickr-input[type="hidden"]')[0]
    let date = input._flatpickr

    if (input.value)
        return;

    date.setDate(conflictYear + "-1-1")
  }

  dateClear(event) {
      event.preventDefault()
  }

  radio(event) {
    console.log(event)
  }

  submit(event) {
    this.element.submit()
  }

  foobar(event) {
    console.log('hihihi')
  }

  delete(event) {
    var confirm = prompt("Really delete this DCJ?", "Yes do it!");
    if (confirm == null || confirm == "") {
      event.preventDefault()
    } else {
      return true;
    }
  }
}