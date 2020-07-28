import React, { useState } from 'react';
import clsx from 'clsx';
import Tab from '@material-ui/core/Tab';
import Card from '@material-ui/core/Card';
import Tabs from '@material-ui/core/Tabs';
import Axios from 'axios';
import Footer from '../Layout/Footer';
import Header from '../Layout/Header';
import Loader from '../../Extras/Loadrr';
import styles from '../../Extras/styles';
import Sidebar from '../Layout/Sidebar/Sidebar';
import Toastrr from '../../Extras/Toastrr';
import Breadcrumb from '../Layout/Breadcrumb';
import HormonesTab from './Tabs/HormonesTab';
import ChemistryTab from './Tabs/ChemistryTab';
import ImmunologyTab from './Tabs/ImmunologyTab';
import HaematologyTab from './Tabs/HaematologyTab';
import BacteriologyTab from './Tabs/BacteriologyTab';
import TumourMarkersTab from './Tabs/TumourMarkersTab';
import { getBaseURL } from '../../Extras/server';
import { useSelector } from 'react-redux';
import { TabPanel, a11yProps } from './Tabs/TabPanel';
import 'tippy.js/dist/tippy.css';

function LabSelection({ history, match }) {
    const patient_id = match.params.patient_id;
    const staff      = useSelector(state => state.authReducer.staff);
    const classes    = styles();
    const visible    = useSelector(state => state.sidebarReducer.visible);

    const [patient, setPatient]   = useState(null);
    const [loading, setLoading]   = useState(true);
    const [message, setMessage]   = useState('');
    const [comError, setComError] = useState(false);
    const [tabIndex, setTabIndex] = useState(0);
    
    React.useEffect(() => {
        document.title        = 'Lab Selection | Liberty Medical Labs';
        const abortController = new AbortController();
        const signal          = abortController.signal;
        
        Axios.post(getBaseURL()+'get_patient', { patient_id }, { signal: signal })
            .then(response => {
                setPatient(response.data[0]);
                setLoading(false);
            })
            .catch(error => {
                setLoading(false);
                setMessage('Network Error. Server Unreachable....');
                setComError(true);
            });

        return () => abortController.abort();
    }, [history, patient_id]);

    const handleChange = (event, newValue) => {
        setTabIndex(newValue);
    };
    
    return (
        <>
            { comError && <Toastrr message={message} type="info"/> }
            <Header staff={staff} />
            <Sidebar roleName={staff && staff.role_name} />
            <main
                className={clsx(classes.contentMedium, {
                    [classes.contentWide]: !visible,
                })}>
                <Breadcrumb page="Lab Selection" />
                {
                    loading ? <Loader /> :
                    <Card variant="outlined" className="p-40">
                        <Tabs
                            // variant="fullWidth"
                            variant="scrollable"
                            scrollButtons="on"
                            indicatorColor="primary"
                            textColor="primary"
                            value={tabIndex}
                            onChange={handleChange}
                            aria-label="simple tabs example">
                            <Tab label="HORMONES" {...a11yProps(0)} />
                            <Tab label="CHEMISTRY" {...a11yProps(1)} />
                            <Tab label="HEAMATOLOGY" {...a11yProps(2)} />
                            <Tab label="BACTERIALOGY" {...a11yProps(3)} />
                            <Tab label="IMMUNOLOGY" {...a11yProps(4)} />
                            <Tab label="TUMOUR MARKERS" {...a11yProps(5)} />
                        </Tabs>
                        <TabPanel value={tabIndex} index={0}>
                            <HormonesTab patient={patient} history={history} />
                        </TabPanel>
                        <TabPanel value={tabIndex} index={1}>
                            <ChemistryTab patient={patient} history={history} />
                        </TabPanel>
                        <TabPanel value={tabIndex} index={2}>
                            <HaematologyTab patient={patient} history={history} />
                        </TabPanel>
                        <TabPanel value={tabIndex} index={3}>
                            <BacteriologyTab patient={patient} history={history} />
                        </TabPanel>
                        <TabPanel value={tabIndex} index={4}>
                            <ImmunologyTab patient={patient} history={history} />
                        </TabPanel>
                        <TabPanel value={tabIndex} index={5}>
                            <TumourMarkersTab patient={patient} history={history} />
                        </TabPanel>
                    </Card>
                }
            </main>
            <Footer />
        </>
    );
}

export default LabSelection;
