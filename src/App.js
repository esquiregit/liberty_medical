import React from 'react';
import CircularProgress from '@material-ui/core/CircularProgress';
import { BrowserRouter } from 'react-router-dom';
import { Route, Switch } from 'react-router-dom';

const Login              = React.lazy(() => import('./Components/External/Login'));
const Report             = React.lazy(() => import('./Components/Internal/Report'));
const Error404           = React.lazy(() => import('./Components/Extras/FourZeroFour'));
const Recovery           = React.lazy(() => import('./Components/External/Recovery'));
const Dashboard          = React.lazy(() => import('./Components/Internal/Dashboard/Dashboard'));
const AuditTrail         = React.lazy(() => import('./Components/Internal/AuditTrail'));
const ManageStaff        = React.lazy(() => import('./Components/Internal/Staff/ManageStaff'));
const ManageCharges      = React.lazy(() => import('./Components/Internal/Charge/ManageCharges'));
const ManageRoles        = React.lazy(() => import('./Components/Internal/Roles/ManageRoles'));
const ManagePatients     = React.lazy(() => import('./Components/Internal/Patient/ManagePatients'));
const ManageRequests     = React.lazy(() => import('./Components/Internal/Request/ManageRequests'));
const PasswordChange     = React.lazy(() => import('./Components/External/PasswordChange'));
const ManageHistories    = React.lazy(() => import('./Components/Internal/History/ManageHistories'));
const UnauthorizedAccess = React.lazy(() => import('./Components/Internal/UnauthorizedAccess'));

function App() {
    return (
        <React.Suspense fallback={<div className="loading-div"><CircularProgress color="primary" /></div>}>
            <BrowserRouter basename={'/'}>
                <Switch>
                    <Route path='/'                           component={ Login }              exact />
                    <Route path='/roles/'                     component={ ManageRoles }        exact />
                    <Route path='/staff/'                     component={ ManageStaff }        exact />
                    <Route path='/report/'                    component={ Report }             exact />
                    <Route path='/charges/'                   component={ ManageCharges }      exact />
                    <Route path='/history/'                   component={ ManageHistories }    exact />
                    <Route path='/patients/'                  component={ ManagePatients }     exact />
                    <Route path='/requests/'                  component={ ManageRequests }     exact />
                    <Route path='/dashboard/'                 component={ Dashboard }          exact />
                    <Route path='/unauthorized-access/'       component={ UnauthorizedAccess } exact />
                    <Route path='/activity-log/'              component={ AuditTrail }         exact />
                    <Route path='/password-recovery/'         component={ Recovery }           exact />
                    <Route path='/password-change/:id/:code/' component={ PasswordChange }     exact />
                    <Route path='*'                           component={ Error404 } />
                </Switch>
            </BrowserRouter>
        </React.Suspense>
    );
}

export default App;
