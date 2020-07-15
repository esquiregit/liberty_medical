export const logIn = (staff, permissions) => {
    return {
        type        : 'LOG_IN',
        staff       : staff,
        permissions : permissions
    };
}

export const isLoggedIn = () => {
    return { type: 'IS_LOGGED_IN' }
}

export const update = staff => {
    return {
        type    : 'UPDATE',
        payload : staff
    }
}
