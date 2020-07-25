const initialState = {
    patient : null
};
const patientReducer  = (state = initialState, action) => {
    switch(action.type) {
        case 'STORE_PATIENT':
            return {
                ...state,
                patient : action.patient
            };
        default: return state;
    }
}

export default patientReducer;
