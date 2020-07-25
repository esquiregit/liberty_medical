import authReducer from './AuthReducer';
import patientReducer from './PatientReducer';
import sidebarReducer from './SidebarReducer';
import { combineReducers } from 'redux';

const appReducer = combineReducers({
    authReducer,
    patientReducer,
    sidebarReducer,
});

const rootReducer = (state, action) => {
    if(action.type === 'LOG_OUT') {
        state = undefined;
    }
    
    return appReducer(state, action);
};

export default rootReducer;
