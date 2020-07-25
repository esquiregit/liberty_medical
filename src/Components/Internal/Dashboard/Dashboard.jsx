import React, { useEffect, useState } from 'react';
import clsx from 'clsx';
import Grid from '@material-ui/core/Grid';
import Axios from 'axios';
import Chart from './Chart';
import Footer from '../Layout/Footer';
import Header from '../Layout/Header';
import DashboardLoadrr from '../../Extras/DashboardLoadrr';
import styles from '../../Extras/styles';
import Sidebar from '../Layout/Sidebar/Sidebar';
import { getBaseURL } from '../../Extras/server';
import { useSelector } from 'react-redux';

function Dashboard({ history }) {
    const staff      = useSelector(state => state.authReducer.staff);
    const classes    = styles();
    const visible    = useSelector(state => state.sidebarReducer.visible);

    const [stats, setStats]     = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        document.title = 'Dashboard | Liberty Medical Labs';

        if(staff) {
            Axios.post(getBaseURL() + 'get_dashboard_stats')
                .then(response => {
                    setStats(response.data[0]);
                    setLoading(false);
                })
                .catch(error => {
                    // setComError(true);
                    setLoading(false);
                });
        } else {
            history.push('/');
        }
    }, [staff, history]);
    
    return (
        <>
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                {
                    loading ? <DashboardLoadrr /> :
                    <>
                        <Grid container spacing={3} className="mt-48">
                            <Grid item sm={12}>
                                <Chart stats={stats} />
                            </Grid>
                        </Grid>
                    </>
                }
            </main>
            <Footer />
        </>
    )
}

export default Dashboard;
