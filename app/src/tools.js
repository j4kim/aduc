import { API_URL } from './env.js'

export function post(scriptName, body) {
  fetch(`${API_URL}/${scriptName}.php`, {
    method: 'POST', body
  })
}