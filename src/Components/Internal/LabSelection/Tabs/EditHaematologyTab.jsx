import React from 'react';
import Button from '@material-ui/core/Button';

const HaematologyTab = ({ history }) => {
    return (
        <table>
            <tbody>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/blood-film-comment/')}
                            variant="outlined">
                            blood film comment
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/clotting-profile/')}
                            variant="outlined">
                            clotting profile
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/d-dimers/')}
                            variant="outlined">
                            d - dimers
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/esr/')}
                            variant="outlined">
                            ESR
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/fbc-3p/')}
                            variant="outlined">
                            FBC 3P
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/fbc-5p/')}
                            variant="outlined">
                            FBC 5P
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/fbc-children/')}
                            variant="outlined">
                            FBC children
                        </Button>
                    </td>
                    <td>
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/ntc-screening/')}
                            variant="outlined">
                            NTC screening
                        </Button>
                    </td>
                </tr>
                <tr>
                    <td colSpan="2">
                        <Button
                            fullWidth
                            onClick={() => history.push('/history/specials/')}
                            variant="outlined">
                            specials
                        </Button>
                    </td>
                </tr>
            </tbody>
        </table>
    )
}

export default HaematologyTab;
