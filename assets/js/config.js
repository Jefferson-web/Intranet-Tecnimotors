const origin = window.location.origin
const index = origin.indexOf('localhost');
const baseURL = index > 0 ? origin + '/grupotecnimotors' : origin;

export const config = {
    baseURL
}