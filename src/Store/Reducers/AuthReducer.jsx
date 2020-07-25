const initialState = {
    staff       : null,
    isLoggedIn  : false,
    permissions : null
};
const authReducer  = (state = initialState, action) => {
    switch(action.type) {
        case 'LOG_IN':
            return {
                ...state,
                staff       : action.staff,
                isLoggedIn  : true,
                permissions : action.permissions
            };
        case 'IS_LOGGED_IN':
            return state.staff ? true : false;
        case 'UPDATE':
            return {
                ...state,
                staff: action.payload
            };
        default: return state;
    }
}

export default authReducer;
