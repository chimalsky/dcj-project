import { Controller } from "stimulus"

export default class extends Controller {
  connect() {
  }

  edit(ev) {
      console.log(ev)
      this.editing = true
  }

  set editing(value) {
      this.data.set('editing', true)
  }
}